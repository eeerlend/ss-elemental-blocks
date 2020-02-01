<?php
namespace eeerlend\Elements\Gallery\Elements;

use eeerlend\Elements\Base\BaseElement;

class ElementPhotoGallery extends BaseElement
{
    private static $table_name = 'eeerlend-ElementPhotoGallery';

    private static $icon = 'font-icon-p-gallery';
    private static $singular_name = 'gallery element';

    private static $plural_name = 'gallery elements';

    private static $description = 'This element displays a grid of clickable images';

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function getType() {
        return 'Gallery';
    }
}
