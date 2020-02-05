<?php
namespace eeerlend\Elements\VideoEmbed\Elements;

use eeerlend\Elements\Base\BaseElement;

class ElementVideoEmbed extends BaseElement
{
    private static $table_name = 'eeerlend-ElementVideoEmbed';

    private static $icon = 'font-icon-block-media';
    private static $singular_name = 'video embed element';
    private static $plural_name = 'video embed elements';
    private static $description = 'This element displays a video embedded from YouTube, Vimeo, etc.';
    private static $inline_editable = true;

    private static $owns = [
        'Image'
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function getType() {
        return 'Video embed';
    }
}
