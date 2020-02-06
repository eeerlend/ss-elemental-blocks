<?php
use SilverStripe\Admin\ModelAdmin;
use eeerlend\Elements\Company\Models\Office;
use eeerlend\Elements\Company\Models\Person;

class CompanyAdmin extends ModelAdmin
{

    private static $managed_models = [
        Office::class,
        Person::class
    ];

    private static $url_segment = 'company';

    private static $menu_title = 'Company';
}
