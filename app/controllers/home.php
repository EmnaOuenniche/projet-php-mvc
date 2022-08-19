<?php

class Home extends Controller {

    public function index($name = ''){
        $user = $this->model('user');
        $user->name = $name;
        
        $data = [
            "name"=>$user->name
        ];
        
        
        $this->view('home/index',$data);
    }


}


?>