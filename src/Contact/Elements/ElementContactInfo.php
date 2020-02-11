<?php
namespace eeerlend\Elements\Contact\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;

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
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Contact information';
    }
}
