<?php

namespace mvc\Engine;
use \PDO;

abstract class Model {
    protected $pdo;

    public function __construct() {
        try{
            $this->pdo = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(DBException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}