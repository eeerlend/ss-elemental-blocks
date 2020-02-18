<?php
namespace eeerlend\Elements\Product\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TextField;

class ElementPackages extends BaseElement
{
    private static $table_name = 'eeerlend-ElementPackages';

    private static $icon = 'font-icon-p-package';
    private static $singular_name = 'package element';
    private static $plural_name = 'package elements';
    private static $description = 'Displays packages';
    private static $inline_editable = true;

    private static $db = [

    ];

    private static $owns = [
        'Image'
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            // PageLink
            $fields->insertAfter(TreeDropdownField::create("PageLinkID", "Linked page", "Page")
            , 'Content');

            $fields->insertAfter(TextField::create('ButtonText', 'ButtonText')
            , 'PageLinkID');
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Product: Packages';
    }
}
