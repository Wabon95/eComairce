<?php

session_start();

require '../vendor/autoload.php';
require '../src/Config.php';
require '../src/Routes.php';

if ($match = $router->match()) {
    list($controller, $method) = explode('#', $match['target']);
    call_user_func_array([new $controller, $method], $match['params']);
} else {
    header('HTTP/1.0 404 Not Found');
    echo 'Page non trouvée';
}