<?php

namespace eeerlend\Elements\Booking\Elements;

use eeerlend\Elements\CTA\Elements\ElementCTA;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\View\Requirements;
use Silverstripe\SiteConfig\SiteConfig;

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

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->insertBefore(
                'PageLinkID',
                TextField::create('TrekksoftActivityID', 'TrekksoftActivityID')
            );
        });

        return parent::getCMSFields();
    }

    public function getType()
    {
        return 'Booking';
    }

    public function forTemplate($holder = true)
    {
        $config = SiteConfig::current_site_config();

        if ($this->TrekksoftActivityID && $config->TrekksoftAPIUrl) {
            Requirements::javascript('https://' . $config->TrekksoftAPIUrl . '/en_GB/api/public');

            Requirements::customScript(
                <<<JS
    (function() {
        var button = new TrekkSoft.Embed.Button();
        button
            .setAttrib("target", "fancy")
            .setAttrib("entryPoint", "tour")
            .setAttrib("tourId", "$this->TrekksoftActivityID")
            .setAttrib("referral", "nkka.no")
            .setAttrib("fancywidth", "615px")
            .registerOnClick("#bookingcta-element__trekksoft-{$this->ID}");
    })();
JS
            );
        }

        return parent::forTemplate($holder);
    }
}
