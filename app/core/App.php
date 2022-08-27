<?php


class App {

    protected $controller = 'homeController';
    protected $method     = 'index';
    protected $params     = [];

    public function __construct() {
        
        if(isset($_GET['controller'])){
            if(file_exists('app/controllers/'.$_GET['controller'].'.php')){
                $this->controller =$_GET['controller'];
                unset($_GET['controller']);
            }
        }
        require_once('app/controllers/'.$this->controller.'.php');
        $this->controller = new $this->controller;


        if(isset($_GET['page'])){
            if(method_exists($this->controller,$_GET['page'])){
                $this->method = $_GET['page'];
                unset($_GET['page']);
            }else{
                $this->method="error404";
                $this->controller = 'homeController';
                require_once('app/controllers/'.$this->controller.'.php');
                $this->controller = new $this->controller;
            }
        }

        
        $this->params = array("GET"=>$_GET,"POST"=>$_POST);
        call_user_func_array([$this->controller,$this->method],$this->params);
    }


}


?>

