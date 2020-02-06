<?php
namespace eeerlend\Elements\Company\Models;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use eeerlend\Elements\Base\BaseDataObject;
use eeerlend\Elements\Company\Elements\ElementOffices;

class Office extends BaseDataObject
{
    private static $table_name = 'eeerlend-Office';

    private static $singular_name = 'Office';
    private static $plural_name = 'Offices';

    private static $db = array(
        'Latitude' => 'Decimal(9,6)',
        'Longitude' => 'Decimal(9,6)',
    );

    private static $belongs_many_many = [
        'ElementOffices' => ElementOffices::class,
    ];

    private static $owns = array(
        'Image',
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content', 'Address')
            ->setRows(6)
        );

        // Image/photo
        $fields->addFieldToTab('Root.Main', UploadField::create('Image', 'Image')
            ->setFolderName('images/offices')
            ->setAllowedExtensions('jpg,jpeg,png')
        , 'Content');

        // Position
        $fields->addFieldToTab('Root.Main', TextField::create('Latitude', 'Latitude')
        , 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Longitude', 'Longitude')
        , 'Content');

        return $fields;
    }

    public function onBeforeWrite() {
        parent::onBeforeWrite();

        if (isset($_POST['Latitude'])) {
            $this->Latitude = str_replace(",", ".", $_POST['Latitude']);
        }

        if (isset($_POST['Longitude'])) {
            $this->Longitude = str_replace(",", ".", $_POST['Longitude']);
        }
    }
}
