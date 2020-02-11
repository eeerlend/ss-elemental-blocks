<?php
namespace eeerlend\Elements\Chart\Models;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use eeerlend\Elements\Base\BaseDataObject;
use eeerlend\Elements\Chart\Elements\ElementChart;

class Dataset extends BaseDataObject
{
    private static $table_name = 'eeerlend-Dataset';

    private static $singular_name = 'Dataset';
    private static $plural_name = 'Datasets';

    private static $db = array(
        'Data' => 'Varchar',
        'BackgroundColor' => 'Varchar',
        'BorderColor' => 'Varchar',
        'PointBackgroundColor' => 'Varchar',
        'PointBorderColor' => 'Varchar',
        'SortOrder' => 'Int',
    );

    private static $has_one = [
        'Chart' => ElementChart::class,
    ];

    private static $default_sort = 'SortOrder';

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'SortOrder',
            'ChartID',
            'ElementLinkID',
        ));

        return $fields;
    }
}
