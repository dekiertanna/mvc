<?php

namespace mvc\Engine;

abstract class View {
    public function generateUrl($name,$data=null) {
        $router = new \mvc\Engine\Router\Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
        $collection = $router->getCollection();
        $route=$collection->get($name);
        if(isset($route)){
            return $route->generateUrl($data);
        }
        return false;
    }

    public function renderHTML($name,$path=''){
        $path=DIR_TEMPLATE.$path.$name.'html.php';
        try{
            if(is_file($path)){
                require $path;
            }
            else{
                throw new \Exception('Can not open template '.$name.' in: '.$path);
            }
        }
        catch(\Exception $e){
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;

        }
    }

    public function renderJSON($data){
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public function renderJSONP($data){
        echo $_GET['callback'] . '(' . json_encode($data) . ')';
        exit();
    }

    public function getHeader(){
        return $this->renderHTML('header','front/');
    }

    public function getFooter(){
        return $this->renderHTML('footer','front/');
    }

    public function __set($name,$value){
        $this->$name=$value;
    }

    public function set($name,$value){
        $this->$name=$value;
    }

    public function __get($name) {
        if( isset($this->$name) )
        return $this->$name;
        return null;
    }
    public function get($name) {
        return $this->$name;
    }

}