<?php

$url = parse_url($_SERVER['REQUEST_URI'])["path"];



$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];


function routeToController($url, $routes){
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    }else {
        abort(404);
    }
}

function abort($code) {
    http_response_code($code);
    require "view/{$code}.php";
    die();
}
routeToController($url, $routes);
