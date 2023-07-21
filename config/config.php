<?php

/*
 * You can place your custom package configuration in here.
 */

use Stephenchen\Core\Http\Backend\Member\MemberModel;

return [

    // For those ip ignore signature
    'white_lists' => [

    ],

    'member_class' => MemberModel::class
];
