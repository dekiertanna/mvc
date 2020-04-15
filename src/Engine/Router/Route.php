<?php

namespace mvc\Engine\Router;

class Route
{
    protected $path;
    protected $file;
    protected $class;
    protected $method;
    protected $defaults;
    protected $params;

    public function __construct($path, $config, $params = array(), $defaults=array())
    {
        $this->path = $path;
        $this->file = $config['file'];
        $this->method = $config['method'];
        $this->class = $config['class'];
        $this->setParams($params);
        $this->setDefaults($defaults); 
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

     /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }
 
    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
 
    /**
     * @param array $defaults
     */
    public function setDefaults($defaults)
    {
        $this->defaults = $defaults;
    }
 
    /**
     * @return array
     */
    public function getDefaults()
    {
        return $this->defaults;
    }
 
    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
 
    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
 
    /**
     * @param array $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
 
    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
 
    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path =$path;
    }
 
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    public function generateUrl($data)
    {
        if (is_array($data) && sizeof($data)>0) {
            $key_data = array_keys($data);
            foreach ($key_data as $key) {
                $data2['<' . $key . '>'] = $data[$key];
            }
            $url = str_replace(array('?', '(', ')'), array('', '', ''), $this->path);
            return str_replace(array_keys($data2), $data2, $url);
        } else {
            $url=preg_replace("#<[a-zA-Z0-9]*>#", '', $this->path, 1);
            return str_replace(array('?', '(', ')'), array('', '', ''), $url);
        }
    }
}