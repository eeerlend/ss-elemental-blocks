<?php
namespace eeerlend\Elements\Base;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

class BaseElement extends \DNADesign\Elemental\Models\BaseElement
{
    private static $table_name = 'eeerlend-BaseElement';

    private static $db = [
        'Content' => 'HTMLText',
        'Alignment' => 'Varchar',
        'Spacing' => 'Varchar',
        'ButtonText' => 'Varchar'
    ];

    private static $has_one = array(
        'File' => File::class,
        'Image' => Image::class,
        'PageLink' => \Page::class,
    );

    private static $defaults = array(
        'Style' => 'light',
        'Alignment' => 'center',
    );

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->removeByName(array(
                'File',
                'Image',
                'PageLinkID',
                'ButtonText'
            ));

            $fields->dataFieldByName('Content')
                    ->setRows(6);

            $alignment = $this->config()->get('alignment');

            if ($alignment && count($alignment) > 0) {
                $alignmentDropdown = DropdownField::create('Alignment', 'Alignment', $alignment)
                    ->setEmptyString('Select alignment..');
                $fields->insertBefore($alignmentDropdown, 'ExtraClass');
            } else {
                $fields->removeByName('Alignment');
            }

            $spacing = $this->config()->get('spacing');
            if ($spacing && count($spacing) > 0) {
                $spacingDropdown = DropdownField::create('Spacing', 'Spacing', $spacing)
                    ->setEmptyString('Select spacing..');
                $fields->insertBefore($spacingDropdown, 'ExtraClass');
            } else {
                $fields->removeByName('Spacing');
            }

            $imagestyle = $this->config()->get('imagestyle');

            if ($imagestyle && count($imagestyle) > 0) {
                $imagestyleDropdown = DropdownField::create('ImageStyle', 'Image style', $imagestyle)
                    ->setEmptyString('Select image style..');
                $fields->insertBefore($imagestyleDropdown, 'ExtraClass');
            } else {
                $fields->removeByName('ImageStyle');
            }

            /*
            $fields->add(DropdownField::create('Style', 'Display style', array(
                'Light' => 'Light',
                'Dark' => 'Dark'
            ))->setEmptyString('(Select display style)'));
            */
        });

        return parent::getCMSFields();
    }
}
