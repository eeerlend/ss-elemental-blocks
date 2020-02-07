<?php
namespace eeerlend\Elements\VideoEmbed\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\DropdownField;

class ElementVideoEmbed extends BaseElement
{
    private static $table_name = 'eeerlend-ElementVideoEmbed';

    private static $icon = 'font-icon-block-media';
    private static $singular_name = 'video embed element';
    private static $plural_name = 'video embed elements';
    private static $description = 'This element displays a video embedded from YouTube, Vimeo, etc.';
    private static $inline_editable = true;

    private static $db = [
        'Provider' => 'Varchar',
        'ExternalVideoTag' => 'Varchar'
    ];

    private static $owns = [
        'Image'
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

            // Image placeholder
            $fields->insertBefore(UploadField::create('Image', 'Pre-play image (optional)')
                ->setFolderName('images')
                ->setAllowedExtensions('jpg,jpeg,png')
                ->setIsMultiUpload(false)
            , 'Content');

            // Video provider
            $providers = $this->config()->get('providers');
            if ($providers && count($providers) > 0) {
                $providerDropdown = DropdownField::create('Provider', 'Video provider', $providers)
                    ->setEmptyString('Select video provider..');
                $fields->insertAfter($providerDropdown, 'Content');
            } else {
                $fields->removeByName('Provider');
            }
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Video embed';
    }
}
