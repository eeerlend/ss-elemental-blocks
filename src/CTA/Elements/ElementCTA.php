<?php
namespace eeerlend\Elements\CTA\Elements;

use eeerlend\Elements\Base\BaseElement;
use eeerlend\Elements\CTA\Elements\ElementCTAGrid;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;


class ElementCTA extends BaseElement
{
    private static $table_name = 'eeerlend-ElementCTA';
    private static $icon = 'font-icon-plus-1';
    private static $singular_name = 'call to action grid element';
    private static $plural_name = 'call to action grid elements';
    private static $description = 'This element displays a single call to action element, that lead the user to another page/section';
    private static $inline_editable = true;

    private static $has_one = [
        'CTAGrid' => ElementCTAGrid::class,
    ];

    private static $owns = [
        'Image'
    ];


    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName('CTAGridID');

            // Image
            $fields->insertAfter(UploadField::create('Image', 'Image or icon')
                ->setFolderName('images')
                ->setAllowedExtensions('jpg,jpeg,png')
                ->setIsMultiUpload(false)
            , 'File');

            // PageLink
            $fields->add(TreeDropdownField::create("PageLinkID", "Linked page", "Page"));
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Call To Action';
    }
}
