<?php
namespace mvc\Engine;

abstract class Controller{
    public function redirect($url)
    {
        header("location: " . $url);
    }

    public function generateUrl($name, $data = null)
    {
        $router = new \mvc\Engine\Router\Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
        $collection = $router->GetCollection();
        $route = $collection->get($name);
        if(isset($route)) {
            return $route->generateUrl($data);
        }
        return false;
    }
}