<?php

class DataBase {

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "Kalilinux1@";
    private $db_name = "";

    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host='.$this->getHost().';dbname='.$this->getName(),$this->getUser(),$this->getPass());
    }

    private function getHost(){
        return $this->db_host;
    }
    private function getUser(){
        return $this->db_user;
    }
    private function getPass(){
        return $this->db_pass;
    }
    private function getName(){
        return $this->db_name;
    }
}
?>