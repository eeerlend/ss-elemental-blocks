<?php
namespace eeerlend\Elements\Contact\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;

class ElementContactForm extends BaseElement
{
    private static $table_name = 'eeerlend-ElementContactForm';

    private static $icon = 'font-icon-p-post';
    private static $singular_name = 'contact form element';
    private static $plural_name = 'contact form elements';
    private static $description = 'Displays a contact form for a given e-mail address';
    private static $inline_editable = true;

    private static $db = [
        'Email' => 'Varchar',
        'NewsletterMessage' => 'Text',
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            // PageLink
            $fields->insertAfter(TreeDropdownField::create("PageLinkID", "Link to privacy policy", "Page")
            , 'Content');

            $fields->insertAfter(TextField::create('NewsletterMessage', 'NewsletterMessage')
            , 'PageLinkID');
        });

        return parent::getCMSFields();
    }

    public function getDateTime() {
        return time();
    }

    public function getType() {
        return 'Contact form';
    }

    public function forTemplate($holder = true) {
        Requirements::customScript(<<<JS
    (function($) {
        $('.fjerndette-$this->ID').each(function(){
            this.remove();
        });
    })(jQuery);
JS
        );
        return parent::forTemplate($holder);
    }
}
