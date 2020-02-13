<?php
namespace eeerlend\Elements\Company\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\Forms\FieldList;
use eeerlend\Elements\Company\Models\Person;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use Symbiote\GridFieldExtensions\GridFieldAddExistingSearchButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use SilverStripe\View\Requirements;

class ElementPersons extends BaseElement
{
    private static $table_name = 'eeerlend-ElementPersons';

    private static $icon = 'font-icon-torsos-all';
    private static $singular_name = 'persons element';
    private static $plural_name = 'persons elements';
    private static $description = 'Displays persons by choice along with their attributes';
    private static $inline_editable = false;

    private static $many_many = [
        'Persons' => Person::class,
    ];

    private static $many_many_extraFields = [
        'Persons' => [
            // would be sort but issues arise when parent and child both have the same sort field names.
            'PersonSort' => 'Int',
        ],
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            if ($this->exists()) {
                $config = $fields->dataFieldByName('Persons')->getConfig();
                $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
                $config->addComponent(new GridFieldAddExistingSearchButton());
                $config->addComponent(new GridFieldOrderableRows('PersonSort'));
            }
        });

        return parent::getCMSFields();
    }

    public function getType() {
        return 'Persons';
    }

    public function forTemplate($holder = true) {
        Requirements::customCSS(<<<CSS
    .cloak-name::after {
        content: "\\40";
    }
CSS
        );

        Requirements::customScript(<<<JS
    (function($) {
        $('.cloak-domain').each(function(){
            var text = $(this).html().replace("dettevirkerkanskje", ".");
            $(this).text(text);
        });
    })(jQuery);
JS
        );
        return parent::forTemplate($holder);
    }
}
