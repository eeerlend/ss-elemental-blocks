<?php
namespace eeerlend\Elements\Gallery\Elements;

use eeerlend\Elements\Base\BaseElement;
use eeerlend\Elements\Gallery\Models\GalleryImage;

class ElementPhotoGallery extends BaseElement
{
    private static $table_name = 'eeerlend-ElementPhotoGallery';
    private static $icon = 'font-icon-picture';
    private static $singular_name = 'gallery element';
    private static $plural_name = 'gallery elements';
    private static $description = 'This element displays a grid of clickable images';

    private static $has_many = [
        'Images' => GalleryImage::class,
    ];

    private static $owns = [
        'Images',
    ];

    private static $inline_editable = false;

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function getType() {
        return 'Gallery';
    }
}
