<?php
namespace eeerlend\Elements\Base;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

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
        'ElementLink' => Link::class,
    );

    private static $owns = array(
        'Image',
    );

    private static $default_sort = 'Title ASC';

    private static $summary_fields = array(
        'Image.CMSThumbnail',
        'Title',
    );

    private static $searchable_fields = array(
        'Title',
        'Content',
    );

    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;
}
