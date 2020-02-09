<?php
namespace eeerlend\Elements\Map\Config;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class ElementMapConfig extends DataExtension
{
    private static $db = [
        'MapboxToken' => 'Varchar',
    ];

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab("Root.Main", TextField::create("MapboxToken", "Mapbox Token")
            ->setDescription('Needed for displaying Mapbox maps on the web site'));
    }
}
