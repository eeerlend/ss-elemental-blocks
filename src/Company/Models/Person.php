<?php
namespace eeerlend\Elements\Company\Models;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use eeerlend\Elements\Base\BaseDataObject;
use eeerlend\Elements\Company\Elements\ElementPersons;
use SilverStripe\View\ArrayData;

class Person extends BaseDataObject
{
    private static $table_name = 'eeerlend-Person';

    private static $singular_name = 'Person';
    private static $plural_name = 'Persons';

    private static $db = array(
        'Role' => 'Varchar',
        'Company' => 'Varchar',
        'Email' => 'Varchar',
        'Phone' => 'Varchar'
    );

    private static $belongs_many_many = [
        'ElementPersons' => ElementPersons::class,
    ];

    private static $owns = array(
        'Image',
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        // Content
        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content', 'Additional info')
            ->setRows(6)
        );

        // Image
        $fields->addFieldToTab('Root.Main', UploadField::create('Image', 'Photo')
            ->setFolderName('images/persons')
            ->setAllowedExtensions('jpg,jpeg,png')
        , 'Content');

        // Role
        $fields->addFieldToTab('Root.Main', TextField::create('Role', 'Role')
        , 'Content');

        // Company
        $fields->addFieldToTab('Root.Main', TextField::create('Company', 'Company')
        , 'Content');

        // Role
        $fields->addFieldToTab('Root.Main', TextField::create('Email', 'Email')
        , 'Content');

        // Role
        $fields->addFieldToTab('Root.Main', TextField::create('Phone', 'Phone')
        , 'Content');

        return $fields;
    }

    public function getCloackedEmailAddress() {
        $cloaked = $this->getEmailCloaked();
        return '<span class="cloak-name" id="cloak-id-'. $this->ID .'">'. $cloaked->Name .'</span><span class="cloak-domain cloak-domain-'. $this->ID .'">'. $cloaked->DomainCloaked .'</span>';
    }

    protected function getEmailCloaked() {
        $email = explode('@', $this->Email);

        return new ArrayData([
            'Name' => $email[0],
            'Domain' => $email[1],
            'DomainCloaked' => str_replace('.', 'dettevirkerkanskje', $email[1])
        ]);
    }
}
