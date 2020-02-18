<?php
namespace eeerlend\Elements\Contact\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;
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
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

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
