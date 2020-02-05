<?php
namespace eeerlend\Elements\Logos\Models;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use eeerlend\Elements\Base\BaseDataObject;
use eeerlend\Elements\Logos\Elements\ElementLogos;

class Logo extends BaseDataObject
{
    private static $table_name = 'eeerlend-Logo';

    private static $singular_name = 'Logo';
    private static $plural_name = 'Logos';

    private static $db = array(
        'Link' => 'Varchar',
    );

    private static $belongs_many_many = [
        'ElementLogos' => ElementLogos::class,
    ];

    private static $owns = array(
        'Image',
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', UploadField::create('Image', 'Logo file')
            ->setFolderName('images/logos')
            ->setAllowedExtensions('png')
        , 'Content');

        return $fields;
    }
}
