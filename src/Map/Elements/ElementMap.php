<?php
namespace eeerlend\Elements\Map\Elements;

use eeerlend\Elements\Base\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;
use Silverstripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\DropdownField;

class ElementMap extends BaseElement
{
    private static $table_name = 'eeerlend-ElementMap';

    private static $icon = 'font-icon-p-map';
    private static $singular_name = 'map element';
    private static $plural_name = 'map elements';
    private static $description = 'Displays a map with a positional marker';
    private static $inline_editable = true;

    private static $db = [
        'Latitude' => 'Decimal(9,6)',
        'Longitude' => 'Decimal(9,6)',
        'MapSize' => 'Varchar',
        'MapZoom' => 'Int',
    ];

    private static $owns = [
        'Image'
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

            // Image
            $fields->insertBefore(UploadField::create('Image', 'Alternative image')
                ->setFolderName('images/maps')
                ->setDescription('Choose an image to show to visitors without map capabilities on their device')
                ->setAllowedExtensions('jpg,jpeg,png')
                ->setIsMultiUpload(false)
            , 'Content');

            // Position
            $fields->insertBefore(TextField::create('Latitude', 'Latitude')
            , 'Content');
            $fields->insertBefore(TextField::create('Longitude', 'Longitude')
            , 'Content');

            // Map sizes
            $mapsizes = $this->config()->get('mapsizes');

            if ($mapsizes && count($mapsizes) > 0) {
                $mapsizeDropdown = DropdownField::create('MapSize', 'Map size', $mapsizes)
                    ->setEmptyString('Select map size..');
                $fields->insertBefore($mapsizeDropdown, 'ExtraClass');
            } else {
                $fields->removeByName('MapSize');
            }

            // Map zooms
            $mapzooms = $this->config()->get('mapzooms');

            if ($mapzooms && count($mapzooms) > 0) {
                $mapzoomDropdown = DropdownField::create('MapZoom', 'Map zoom', $mapzooms)
                    ->setEmptyString('Select map zoom..');
                $fields->insertBefore($mapzoomDropdown, 'ExtraClass');
            } else {
                $fields->removeByName('MapZoom');
            }
        });

        return parent::getCMSFields();
    }

    public function forTemplate($holder = true) {
        Requirements::javascript('https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.js');
        Requirements::css('https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.css');

        return parent::forTemplate($holder);
    }

    public function getJavascriptBlock() {
        $config = SiteConfig::current_site_config();

        Requirements::customScript(<<<JS
    var testing = [$this->Longitude, $this->Latitude];

    mapboxgl.accessToken = '$config->MapboxToken';
    var map = new mapboxgl.Map({
        container: 'map-element__map-$this->ID', // container id
        style: 'mapbox://styles/mapbox/basic-v9',
        center: [$this->Longitude, $this->Latitude], // starting position [lng, lat]
        zoom: $this->MapZoom // starting zoom
    });

    map.scrollZoom.disable();
    map.on("load", function () {

    /* Image: An image is loaded and added to the map. */
    map.loadImage("https://i.imgur.com/MK4NUzI.png", function(error, image) {
        if (error) throw error;
        map.addImage("custom-marker", image);
        /* Style layer: A style layer ties together the source and image and specifies how they are displayed on the map. */
        map.addLayer({
            id: "markers",
            type: "symbol",
            /* Source: A data source specifies the geographic coordinate where the image marker gets placed. */
            source: {
            type: "geojson",
            data: {
                type: "FeatureCollection",
                features:[{"type":"Feature","geometry":{"type":"Point","coordinates":[$this->Longitude, $this->Latitude]}}]}
            },
            layout: {
                "icon-image": "custom-marker",
            }
        });
        });
    });

    // Add zoom and rotation controls to the map.
    map.addControl(new mapboxgl.NavigationControl());
JS
        );
    }

    public function getType() {
        return 'Map';
    }

    public function onBeforeWrite() {
        parent::onBeforeWrite();

        if (isset($_POST['Latitude'])) {
            $this->Latitude = str_replace(",", ".", $_POST['Latitude']);
        }

        if (isset($_POST['Longitude'])) {
            $this->Longitude = str_replace(",", ".", $_POST['Longitude']);
        }

        if (!$this->MapZoom) {
            $this->MapZoom = '8';
        }
    }
}
