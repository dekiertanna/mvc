<?php
function debug_to_console($data) {
    

    echo "<script>console.log('Debug Objects: " . $data . "' );</script>";
}
require_once 'config.php';
$loader = include DIR_VENDOR.'autoload.php';
require_once 'config-router.php';
$router = new \mvc\Engine\Router\Router('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
$router->run();
$file=$router->getFile();
$classController=$router->getClass();
$method=$router->GetMethod();
debug_to_console($file);
require_once($file);
$obj = new $classController();
$obj->$method();
