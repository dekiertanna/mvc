<?php
$collection = new \mvc\Router\RouteCollection();

$collection->add('category/delete',new \mvc\Engine\Router\Route(
    HTTP_SERVER.'kategorie/usun/<id>?',
    array(
        'file' =>DIR_CONTROLLER.'Category.php',
        'method' => 'delete',
        'class' => '\mvc\Controller\Category'
    ),
    array(
        'id'=>'\d+'
    ),
    array(
        'id' => 0
    )
));

$collection->add('category/add',new \mvc\Engine\Router\Route(
    HTTP_SERVER.'kategorie/dodaj',
    array(
        'file' =>DIR_CONTROLLER.'Category.php',
        'method' => 'add',
        'class' => '\mvc\Controller\Category'
    )
));

$collection->add('category/index',new \mvc\Engine\Router\Route(
    HTTP_SERVER.'kategorie',
    array(
        'file' =>DIR_CONTROLLER.'Category.php',
        'method' => 'index',
        'class' => '\mvc\Controller\Category'
    )
));

$collection->add('article/delete',new \mvc\Engine\Router\Route(
    HTTP_SERVER.'kategorie/usun/<id>?',
    array(
        'file' =>DIR_CONTROLLER.'Article.php',
        'method' => 'one',
        'class' => '\mvc\Controller\Category'
    ),
    array(
        'id'=>'\d+'
    ),
    array(
        'id' => 0
    )
));

$collection->add('article/add',new \mvc\Engine\Router\Route(
    HTTP_SERVER.'kategorie/usun/<id>?',
    array(
        'file' =>DIR_CONTROLLER.'Article.php',
        'method' => 'add',
        'class' => '\mvc\Controller\Article'
    ),
    array(
        'id'=>'\d+'
    ),
    array(
        'id' => 0
    )
));

$collection->add('homepage',new \mvc\Engine\Router\Route(
    HTTP_SERVER.'kategorie/usun/<id>?',
    array(
        'file' =>DIR_CONTROLLER.'Article.php',
        'method' => 'index',
        'class' => '\mvc\Controller\Article'
    ),
    array(
        'id'=>'\d+'
    ),
    array(
        'id' => 0
    )
));

$router = new \mvc\Engine\Router\Router($_SERVER['REQUEST URI'], $collection);