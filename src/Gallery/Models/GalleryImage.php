<?php
namespace eeerlend\Elements\Gallery\Models;

use eeerlend\Elements\Base\BaseDataObject;
use eeerlend\Elements\Gallery\ElementPhotoGallery;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\LiteralField;

class GalleryImage extends BaseDataObject
{
    private static $table_name = 'eeerlend-GalleryImage';

    private static $singular_name = 'Gallery Image';

    private static $plural_name = 'Gallery Images';

    private static $db = array(
        'SortOrder' => 'Int',
    );

    private static $has_one = array(
        'PhotoGallery' => ElementPhotoGallery::class,
        // Image is covered by BaseElementObject
    );

    private static $owns = array(
        'Image',
    );

    private static $summary_fields = array(
        'Summary' => 'Summary',
    );

    private static $searchable_fields = array(
        'Title',
        'Content',
    );

    private static $default_sort = 'SortOrder';

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'SortOrder',
            'PhotoGalleryID',
            'ElementLinkID',
        ));

        $image = $fields->dataFieldByName('Image')
            ->setFolderName('Uploads/Elements/PhotoGallery/');
        $fields->insertBefore($image, 'Content');

        // so if anything depends on PageLink it doesn't flake out
        $fields->replaceField('PageLink', new LiteralField('PageLink', ''));

        return $fields;
    }
}
