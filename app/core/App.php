<?php

class App{
    
    protected $controller = 'home';
    protected $method     = 'index';
    protected $params     = [];
    
    public function __construct(){
        $this->parseUrl($_GET['url']);
    }

    public function parseUrl(){
        if(isset($_GET['url'])){
            echo $_GET['url'];
        }
    }
}