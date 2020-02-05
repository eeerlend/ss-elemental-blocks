<?php
namespace eeerlend\Elements\Base;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;

class BaseDataObject extends DataObject
{
    private static $table_name = 'eeerlend-BaseDataObject';

    private static $db = array(
        'Title' => 'Varchar(255)',
        'ShowTitle' => 'Boolean',
        'Content' => 'HTMLText',
    );

    private static $has_one = array(
        'Image' => Image::class,
        'File' => File::class,
        'ElementLink' => \Page::class,
    );

    private static $owns = array(
        'Image',
        'File'
    );

    private static $default_sort = 'Title ASC';

    private static $summary_fields = array(
        'Image.CMSThumbnail',
        'Title',
    );

    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);

        $labels['Title'] = 'Title';
        $labels['ElementLinkID'] = 'Link';
        $labels['Image'] = 'Image';
        $labels['Image.CMSThumbnail'] = 'Image';
        $labels['Content'] = 'Content';

        return $labels;
    }

    private static $searchable_fields = array(
        'Title',
        'Content',
    );

    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->removeByName(array(
                'Sort',
                'ShowTitle',
                'Content',
                'ElementLinkID',
                'Image',
                'File'
            ));
        });

        return parent::getCMSFields();
    }
}
