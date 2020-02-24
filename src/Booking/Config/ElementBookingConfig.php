<?php
namespace eeerlend\Elements\Booking\Config;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class ElementBookingConfig extends DataExtension
{
    private static $db = [
        'TrekksoftAPIUrl' => 'Varchar',
    ];

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab("Root.Main", TextField::create("TrekksoftAPIUrl", "Trekksoft api url")
            ->setDescription('Needed for making Trekksoft booking available on the web page'));
    }
}
