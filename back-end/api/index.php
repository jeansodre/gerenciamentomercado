<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);


if ($uri[1] !== 'api') {
    header('HTTP/1.1 404 Not Found');
    exit();
}

$requestMethod = $_SERVER['REQUEST_METHOD'];

$pieces = explode("-", $uri[2]);
$controller = "";

foreach ($pieces as $piece) {
    $controller .= ucfirst($piece);
}

$controller .= 'Controller';


if (file_exists("controllers/{$controller}.php")) {
   
    require_once "controllers/{$controller}.php";
    $controller = new $controller($requestMethod);
    $controller->processRequest();
} else {
    header('HTTP/1.1 404 Not Found');
    exit();
}
