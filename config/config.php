<?php

/*
 * You can place your custom package configuration in here.
 */

use Stephenchen\Core\Http\Backend\Member\MemberModel;

return [

    // Use fake image instead of real image
    'use_fake_image' => false,

    // For those ip ignore signature
    'white_lists' => [

    ],

    'member_class' => MemberModel::class,

    /*
    |--------------------------------------------------------------------------
    | Support Languages
    |--------------------------------------------------------------------------
    */
    'support_languages' => [
        'en',
        'zh-TW'
    ],

    /*
    |--------------------------------------------------------------------------
    | Application defaults Languages
    |--------------------------------------------------------------------------
    |
    | Default languages for application, must be one of support languages
    */
    'default_language' => 'zh-TW',
];
