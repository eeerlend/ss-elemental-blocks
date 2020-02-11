<?php
namespace eeerlend\Elements\Chart\Elements;

use eeerlend\Elements\Base\BaseElement;
use eeerlend\Elements\Chart\Elements\ElementChart;
use SilverStripe\Forms\FieldList;

class ElementChartGrid extends BaseElement
{
    private static $table_name = 'eeerlend-ElementCharts';
    private static $icon = 'font-icon-chart-line';
    private static $singular_name = 'chart grid element';
    private static $plural_name = 'chart grid elements';
    private static $description = 'This element displays a grid with charts';

    private static $has_many = [
        'Charts' => ElementChart::class,
    ];

    private static $inline_editable = false;

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName('Content');
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Chart grid';
    }
}
