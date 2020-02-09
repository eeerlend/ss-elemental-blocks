<?php
namespace eeerlend\Elements\CTA\Elements;

use eeerlend\Elements\Base\BaseElement;
use eeerlend\Elements\CTA\Elements\ElementCTAGrid;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TextField;

class ElementCTA extends BaseElement
{
    private static $table_name = 'eeerlend-ElementCTA';
    private static $icon = 'font-icon-angle-double-right';
    private static $singular_name = 'call to action grid element';
    private static $plural_name = 'call to action grid elements';
    private static $description = 'This element displays a single call to action element, that lead the user to another page/section';
    private static $inline_editable = true;

    private static $db = [
        'ImageStyle' => 'Varchar',
        'IconClass' => 'Varchar',
    ];

    private static $has_one = [
        'CTAGrid' => ElementCTAGrid::class,
    ];

    private static $owns = [
        'Image'
    ];

    private static $defaults = array(
        'ShowTitle' => 1,
        'ImageStyle' => 'rounded'
    );

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName('CTAGridID');

            // Image
            $fields->insertBefore(UploadField::create('Image', 'Image or icon')
                ->setFolderName('images')
                ->setAllowedExtensions('jpg,jpeg,png')
                ->setIsMultiUpload(false)
            , 'Content');

            // PageLink
            $fields->insertAfter(TreeDropdownField::create("PageLinkID", "Linked page", "Page")
            , 'Image');

            $fields->insertAfter(TextField::create('ButtonText', 'ButtonText')
            , 'PageLinkID');

            $fields->insertBefore(TextField::create('IconClass', 'IconClass')
            , 'ExtraClass');
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'CTA';
    }
}
