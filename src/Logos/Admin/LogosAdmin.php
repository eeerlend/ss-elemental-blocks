<?php
use SilverStripe\Admin\ModelAdmin;
use eeerlend\Elements\Logos\Models\Logo;

class LogosAdmin extends ModelAdmin
{
    private static $managed_models = [
        Logo::class,
    ];

    private static $url_segment = 'logos';

    private static $menu_title = 'Logos';
}
