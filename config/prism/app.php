<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Prism App Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to display the name of the application within the UI
    | or in other locations. Of course, you're free to change the value.
    |
    */

    'name' => 'Prism',

    /*
    |--------------------------------------------------------------------------
    | Prism App URL
    |--------------------------------------------------------------------------
    |
    | This URL is where users will be directed when clicking the application
    | name in the Prism navigation bar. You are free to change this URL to
    | any location you wish depending on the needs of your application.
    |
    */

    'url' => env('APP_URL', '/'),

    /*
    |--------------------------------------------------------------------------
    | Prism Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Prism will be accessible from. Feel free to
    | change this path to anything you like. Note that this URI will not
    | affect Prism's internal API routes which aren't exposed to users.
    |
    */

    'path' => '/prism',

    /*
    |--------------------------------------------------------------------------
    | Prism Authentication Guard
    |--------------------------------------------------------------------------
    |
    | This configuration option defines the authentication guard that will
    | be used to protect your Prism routes. This option should match one
    | of the authentication guards defined in the "auth" config file.
    |
    */

    'guard' => env('PRISM_GUARD', null),

    /*
    |--------------------------------------------------------------------------
    | Prism Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Prism route, giving you the
    | chance to add your own middleware to this stack or override any of
    | the existing middleware. Or, you can just stick with this stack.
    |
    */

    'middleware' => [
        'web',
    ],

    /*
    |--------------------------------------------------------------------------
    | Prism Pagination Type
    |--------------------------------------------------------------------------
    |
    | This option defines the pagination visual style used by Resources. You
    | may choose between two types: "simple" and "links". Feel free to set
    | this option to the visual style you like for your application.
    |
    */

    'pagination' => 'simple',

];
