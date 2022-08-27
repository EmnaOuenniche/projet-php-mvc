<?php

class DataBase {

    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host='.$this->getHost().';dbname='.$this->getName(),$this->getUser(),$this->getPass());
    }

    private function getHost(){
        return $GLOBALS['DB_HOST'];
    }

    private function getUser(){
        return $GLOBALS['DB_USER'];
    }

    private function getPass(){
        return $GLOBALS['DB_PASS'];
    }

    private function getName(){
        return $GLOBALS['DB_NAME'];
    }
    
}
?>