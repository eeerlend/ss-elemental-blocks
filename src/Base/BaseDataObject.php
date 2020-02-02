<?php
namespace eeerlend\Elements\Base;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Assets\Image;

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
        'ElementLink' => \Page::class,
    );

    private static $owns = array(
        'Image',
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
            ));

            $fields->removeByName('ShowTitle');

            $image = $fields->dataFieldByName('Image')
                ->setFolderName('Images');

            $fields->insertBefore($image, 'Content');

            $fields->dataFieldByName('Content')
                ->setRows(8);
        });

        return parent::getCMSFields();
    }
}
