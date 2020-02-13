<?php
namespace eeerlend\Elements\Contact\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;

class ElementContactInfo extends BaseElement
{
    private static $table_name = 'eeerlend-ElementContactInfo';

    private static $icon = 'font-icon-p-mail';
    private static $singular_name = 'contact info element';
    private static $plural_name = 'contact info elements';
    private static $description = 'Displays contact information';
    private static $inline_editable = true;

    private static $db = [
        'Phone' => 'Varchar',
        'Email' => 'Varchar',
        'Address' => 'Varchar',
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Contact information';
    }

    public function getCloackedEmailAddress() {
        $cloaked = $this->getEmailCloaked();
        return '<span class="cloak-name" id="cloak-id-'. $this->ID .'">'. $cloaked->Name .'</span><span class="cloak-domain cloak-domain-'. $this->ID .'">'. $cloaked->DomainCloaked .'</span>';
    }

    public function getEmailCloaked() {
        $email = explode('@', $this->Email);

        return new ArrayData([
            'Name' => $email[0],
            'Domain' => $email[1],
            'DomainCloaked' => str_replace('.', 'dettevirkerkanskje', $email[1])
        ]);
    }

    public function forTemplate($holder = true) {
        Requirements::customCSS(<<<CSS
    .cloak-name::after {
        content: "\\40";
    }
CSS
        );

        Requirements::customScript(<<<JS
    (function($) {
        $('.cloak-domain-$this->ID').each(function(){
            var text = $(this).html().replace("dettevirkerkanskje", ".");
            $(this).text(text);
        });
    })(jQuery);
JS
        );
        return parent::forTemplate($holder);
    }
}
