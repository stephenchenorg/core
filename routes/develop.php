<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Stephenchen\Core\Constant\Constant;

if (!App::environment(Constant::ENVIRONMENT_PRODUCTION)) {

    Route::group([
        'prefix'    => 'api/core',
        'namespace' => 'Stephenchen\Core\Http',
    ], function () {

        /*
        |--------------------------------------------------------------------------
        | Admin Auth
        |--------------------------------------------------------------------------
        */

        Route::group([
            'prefix' => 'ping',
        ], function () {
            Route::get('success', 'PingController@success');
        });
    });
}
