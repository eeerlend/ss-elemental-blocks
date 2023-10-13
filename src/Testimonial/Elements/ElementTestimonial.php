<?php

namespace eeerlend\Elements\Testimonial\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;

class ElementTestimonial extends BaseElement
{
    private static $table_name = 'eeerlend-ElementTestimonial';

    private static $icon = 'font-icon-chat';
    private static $singular_name = 'testimonial element';
    private static $plural_name = 'testimonial elements';
    private static $description = 'Displays a testimonial';
    private static $inline_editable = true;

    private static $db = [
        'Source' => 'Varchar'
    ];

    private static $owns = [
        'Image'
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            // Image
            $fields->insertBefore(
                'Content',
                UploadField::create('Image', 'Photo')
                    ->setFolderName('images')
                    ->setAllowedExtensions('jpg,jpeg,png')
                    ->setIsMultiUpload(false)
            );
        });

        return parent::getCMSFields();
    }

    public function getType()
    {
        return 'Testimonial';
    }
}
