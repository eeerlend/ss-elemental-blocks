<?php
namespace eeerlend\Elements\Booking\Elements;

use eeerlend\Elements\CTA\Elements\ElementCTA;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;

class ElementBookingCTA extends ElementCTA
{
    private static $table_name = 'eeerlend-ElementBookingCTA';
    private static $icon = 'font-icon-p-event-alt';
    private static $singular_name = 'booking element';
    private static $plural_name = 'booking elements';
    private static $description = 'This element displays a booking button';
    private static $inline_editable = true;

    private static $db = [
        'TrekksoftActivityID' => 'Varchar',
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->insertAfter(TextField::create('TrekksoftActivityID', 'TrekksoftActivityID')
            , 'Content');
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Booking';
    }
}
