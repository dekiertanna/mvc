<?php
namespace mvc\Engine\Router;

class RouteCollection
{
    protected $items;
    public function add($name,$item)
    {
        $this->items[$name] = $item;
    }

    public function get($name)
    {
        if(array_key_exists($name, $this->items))
        {
            return $this->items[$name];
        }
        else{
            return null;
        }
    }

    public function getAll()
    {
        return $this->items;
    }

}