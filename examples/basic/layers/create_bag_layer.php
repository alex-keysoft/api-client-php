<?php

/**
 * Copyright (c) 2019 Planviewer BV.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/Planviewer/api-client-php
 *
 *
 * Example create a new layer for a viewer
 *
 * @see https://docs.planviewer.nl/mapsapi/server_calls/layers.html#create-a-new-layer-for-a-viewer
 */

use Planviewer\Planviewer;

require dirname(__DIR__).'/../bootstrap.php';

$planviewer = new Planviewer();


/** available layer-types */
$types = $planviewer->mapsApi->listLayerTypes();

/** create viewer for example */
/** mandatory */
$data = [
    'name' => 'my-viewer-with-bag-layer',
];

/** optional */
$options = [
    'default_show_print' => true,
    'default_show_reset' => true,
    'default_show_measure' => true,
    'default_show_snap' => true,
];

/** Create viewer for this example */
$viewer = $planviewer->mapsApi->createViewer($data, $options);

/* layer options */
/** mandatory for BAG (building) layer */
$data = [
    'name' => 'my-bag-layer',

    /** must be one of $types */
    'type' => 'bag',

];

/** options */
$options = [
    'base' => false,
    'consultable' => true,
    'show_layer' => true,
];


$layer = $planviewer->mapsApi->createLayer($viewer->viewer->identifier,$data, $options);

var_dump($layer);