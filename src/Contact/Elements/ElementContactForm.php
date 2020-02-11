<?php
namespace eeerlend\Elements\Contact\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;

class ElementContactForm extends BaseElement
{
    private static $table_name = 'eeerlend-ElementContactForm';

    private static $icon = 'font-icon-p-post';
    private static $singular_name = 'contact form element';
    private static $plural_name = 'contact form elements';
    private static $description = 'Displays a contact form for a given e-mail address';
    private static $inline_editable = true;

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Contact form';
    }
}
