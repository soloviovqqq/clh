<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->get('options', ['uses' => 'OptionController@getOptions']);
