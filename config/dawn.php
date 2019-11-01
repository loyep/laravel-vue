<?php

return [
    //
    'cache' => [

        // Enable or disable partialcache alltogether
        'enabled' => false,

        // The base key that used for cache items
        'key'     => 'dawncache',

        // The default cache duration in second, set null to remember forever
        'expire'  => 3600
    ],

    'qrcode' => [

        // The default cache duration in second, set null to remember forever
        'expire' => 300,
        'size'   => 200,

        'margin' => 0,
        'format' => 'png',

    ],
];
