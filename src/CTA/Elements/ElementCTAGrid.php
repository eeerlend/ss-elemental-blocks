<?php
namespace eeerlend\Elements\CTA\Elements;

use eeerlend\Elements\Base\BaseElement;
use eeerlend\Elements\CTA\Elements\ElementCTA;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;

class ElementCTAGrid extends BaseElement
{
    private static $table_name = 'eeerlend-ElementCTAGrid';
    private static $icon = 'font-icon-p-posts';
    private static $singular_name = 'call to action grid element';
    private static $plural_name = 'call to action grid elements';
    private static $description = 'This element displays a grid with call to action elements, that lead the user to another page/section';
    private static $inline_editable = false;

    private static $db = [
        'ImageStyle' => 'Varchar',
    ];

    private static $has_many = [
        'CallToActions' => ElementCTA::class,
    ];

    private static $defaults = array(
        'ImageStyle' => 'rounded'
    );

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName('Content');
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Call To Action grid';
    }
}
