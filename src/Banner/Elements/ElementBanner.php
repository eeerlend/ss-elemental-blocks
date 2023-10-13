<?php

namespace eeerlend\Elements\Banner\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;

class ElementBanner extends BaseElement
{
    private static $table_name = 'eeerlend-ElementBanner';
    private static $icon = 'font-icon-image';
    private static $singular_name = 'banner element';
    private static $plural_name = 'banner elements';
    private static $description = 'This element displays block with video / image, content and a call to action link';
    private static $inline_editable = true;

    private static $has_one = [
        'IconFile' => Image::class
    ];

    private static $owns = [
        'File',
        'Image',
        'IconFile'
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            // PageLink
            $fields->add(TreeDropdownField::create("PageLinkID", "Linked page", "Page"));

            // Button text
            $fields->insertAfter(
                'PageLinkID',
                TextField::create('ButtonText', 'ButtonText')
            );

            // IconFile
            $fields->insertBefore(
                'Content',
                UploadField::create('IconFile', 'Icon')
                    ->setFolderName('icons')
                    ->setAllowedExtensions('jpg,jpeg,png')
                    ->setDescription('Optional icon to display on top of the Title')
                    ->setIsMultiUpload(false),
            );

            // Image
            $fields->insertAfter(
                'Title',
                UploadField::create('Image', 'Background Image')
                    ->setFolderName('images')
                    ->setAllowedExtensions('jpg,jpeg,png')
                    ->setIsMultiUpload(false),
            );

            // Video
            $fields->insertAfter(
                'Image',
                UploadField::create('File', 'Background Video')
                    ->setFolderName('videos')
                    ->setAllowedExtensions('mp4')
                    ->setIsMultiUpload(false),
            );
        });

        return parent::getCMSFields();
    }

    public function getType()
    {
        return 'Banner';
    }
}
