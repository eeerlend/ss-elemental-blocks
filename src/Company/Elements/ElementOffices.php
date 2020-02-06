<?php
namespace eeerlend\Elements\Company\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;
use eeerlend\Elements\Company\Models\Office;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use Symbiote\GridFieldExtensions\GridFieldAddExistingSearchButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class ElementOffices extends BaseElement
{
    private static $table_name = 'eeerlend-ElementOffices';

    private static $icon = 'font-icon-globe';
    private static $singular_name = 'offices element';
    private static $plural_name = 'offices elements';
    private static $description = 'Displays offices by choice with relevant contact information';
    private static $inline_editable = false;

    private static $many_many = [
        'Offices' => Office::class,
    ];

    private static $many_many_extraFields = [
        'Offices' => [
            // would be sort but issues arise when parent and child both have the same sort field names.
            'OfficeSort' => 'Int',
        ],
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            if ($this->exists()) {
                $config = $fields->dataFieldByName('Offices')->getConfig();
                $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
                $config->addComponent(new GridFieldAddExistingSearchButton());
                $config->addComponent(new GridFieldOrderableRows('OfficeSort'));
            }
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Offices';
    }
}
