<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->get('options', ['uses' => 'OptionController@getOptions']);

$router->get('reload', function () {
    return response()->json(['reloadProtocol' => config('main.reload_protocol')]);
});
