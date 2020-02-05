<?php
namespace eeerlend\Elements\Logos\Elements;

use eeerlend\Elements\Base\BaseElement;
use eeerlend\Elements\Logos\Models\Logo;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use Symbiote\GridFieldExtensions\GridFieldAddExistingSearchButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class ElementLogos extends BaseElement
{
    private static $table_name = 'eeerlend-ElementLogos';

    private static $icon = 'font-icon-thumbnails';
    private static $singular_name = 'logos element';
    private static $plural_name = 'logos elements';
    private static $description = 'Displays a grid with logos';
    private static $inline_editable = false;

    private static $many_many = [
        'Logos' => Logo::class,
    ];

    private static $many_many_extraFields = [
        'Logos' => [
            // would be sort but issues arise when parent and child both have the same sort field names.
            'LogoSort' => 'Int',
        ],
    ];

    public function getType() {
        return 'Logos';
    }

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->dataFieldByName('Content')
                    ->setRows(6);

            if ($this->exists()) {
                $config = $fields->dataFieldByName('Logos')->getConfig();
                $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
                $config->addComponent(new GridFieldAddExistingSearchButton());
                $config->addComponent(new GridFieldOrderableRows('LogoSort'));
            }
        });

        return parent::getCMSFields();
    }
}
