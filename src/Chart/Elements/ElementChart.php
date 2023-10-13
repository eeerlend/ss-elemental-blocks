<?php

namespace eeerlend\Elements\Chart\Elements;

use eeerlend\Elements\Base\BaseElement;
use eeerlend\Elements\Chart\Elements\ElementChartGrid;
use eeerlend\Elements\Chart\Models\Dataset;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\DropdownField;
use Silverstripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

class ElementChart extends BaseElement
{
    private static $table_name = 'eeerlend-ElementChart';

    private static $icon = 'font-icon-chart-line';
    private static $singular_name = 'chart element';
    private static $plural_name = 'chart elements';
    private static $description = 'Displays a visual chart';
    private static $inline_editable = false;

    private static $db = [
        'ChartStyle' => 'Varchar',
        'Labels' => 'Varchar',
        'BorderWidth' => 'Varchar',
        'DisplayFill' => 'Boolean',
    ];

    private static $has_one = [
        'ChartGrid' => ElementChartGrid::class,
    ];

    private static $has_many = [
        'Datasets' => Dataset::class,
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName('ChartGridID');

            // Chart styles
            $chartstyles = $this->config()->get('chartstyles');

            if ($chartstyles && count($chartstyles) > 0) {
                $chartstyleDropdown = DropdownField::create('ChartStyle', 'Chart style', $chartstyles)
                    ->setEmptyString('Select chart style..');
                $fields->insertBefore('Content', $chartstyleDropdown);
            } else {
                $fields->removeByName('ChartStyle');
            }

            // Borther widths
            $borderwidths = $this->config()->get('borderwidths');

            if ($borderwidths && count($borderwidths) > 0) {
                $borderwidthDropdown = DropdownField::create('BorderWidth', 'Line thickness', $borderwidths)
                    ->setEmptyString('Select line width..');
                $fields->insertBefore('Content', $borderwidthDropdown);
            } else {
                $fields->removeByName('BorderWidth');
            }
        });

        return parent::getCMSFields();
    }

    public function forTemplate($holder = true)
    {
        Requirements::javascript('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js');

        return parent::forTemplate($holder);
    }

    public function getJavascriptBlock()
    {
        $config = SiteConfig::current_site_config();

        switch ($this->ChartStyle) {
            case 'bar':
                $this->populateBars();
                break;
            case 'line':
                $this->populateLines();
                break;
            default:
                break;
        }
    }

    public function populateLines()
    {
        /* $jsonArrray = $this->getDataSet();
        $data = implode(', ', $jsonArrray['data']);
        $backgroundColors = "'". implode("', '", $jsonArrray['backgroundColor']) ."'";
        $pointBackgroundColors = "'". implode("', '", $jsonArrray['pointBackgroundColor']) ."'";
        $borderColors = "'". implode("', '", $jsonArrray['borderColor']) ."'";
        $pointBorderColors = "'". implode("', '", $jsonArrray['pointBorderColor']) ."'";
        $labels = "'". implode("', '", $jsonArrray['label']) ."'";
        $fills = "'". implode("', '", $jsonArrray['fill']) ."'";
        */
        $datasets = $this->Datasets();
        $json = [];

        foreach ($datasets as $dataset) {
            $json[] = [
                'label' => $dataset->Title,
                'borderColor' => $dataset->BorderColor,
                'backgroundColor' => $dataset->BackgroundColor,
                'pointBorderColor' => $dataset->PointBorderColor,
                'pointBackgroundColor' => $dataset->PointBackgroundColor,
                'borderWidth' => $this->BorderWidth,
                'fill' => ($this->DisplayFill ? true : false),
                'data' => explode(',', $dataset->Data)
            ];
        }

        //die(json_encode($json));
        $datasets = json_encode($json);
        $labels = json_encode(explode(',', $this->Labels));

        Requirements::customScript(
            <<<JS
    var ctx = document.getElementById('chart-element__chart-$this->ID');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: $labels,
            datasets: $datasets
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
JS
        );
    }

    public function populateBars()
    {
        $jsonArrray = $this->getDataSet();
        $data = implode(', ', $jsonArrray['data']);
        $backgroundColors = "'" . implode("', '", $jsonArrray['backgroundColor']) . "'";
        $borderColors = "'" . implode("', '", $jsonArrray['borderColor']) . "'";
        $labels = "'" . implode("', '", $jsonArrray['label']) . "'";

        Requirements::customScript(
            <<<JS
    var ctx = document.getElementById('chart-element__chart-$this->ID');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [$labels],
            datasets: [{
                label: '# of elements',
                data: [$data],
                backgroundColor: [$backgroundColors],
                borderColor: [$borderColors],
                borderWidth: $this->BorderWidth
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
JS
        );
    }

    public function getDataSet()
    {
        $json = [
            'label' => [],
            'data' => [],
            'backgroundColor' => [],
            'borderColor' => []
        ];

        foreach ($this->Datasets() as $dataset) {
            $json['label'][] = $dataset->Title;
            $json['data'][] = $dataset->Data;
            $json['backgroundColor'][] = $dataset->BackgroundColor;
            $json['borderColor'][] = $dataset->BorderColor;
            $json['pointBackgroundColor'][] = $dataset->BackgroundColor;
            $json['pointBorderColor'][] = $dataset->BorderColor;
            $json['fill'][] = 'true';
        }

        return $json;
    }

    public function getType()
    {
        return 'Chart';
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        if (!$this->BorderWidth) {
            $this->BorderWidth = 3;
        }
    }
}
