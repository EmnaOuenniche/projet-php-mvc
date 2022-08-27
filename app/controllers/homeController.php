<?php

class homeController extends Controller {
    
    private $user;
    private $article;

    public function __construct(){
        $this->user = $this->model('user');
        $this->article = $this->model('article'); 
    }

    
    public function index(){
        $articlesList = $this->article->getAllVisible();
        for($i=0;$i<count($articlesList);$i++){
            $articlesList[$i]['image'] = "assets/uploads/".$articlesList[$i]['image'];
            $articlesList[$i]['date']  = date('d/m/Y H:i:s',$articlesList[$i]['date']);
            $articlesList[$i]['user'] = ($this->user->getUserDataById($articlesList[$i]['user_id'] ))['name'];
        }
        $this->view('home/index',$data = ["articles"=>$articlesList]);
    }

    public function error404(){
        echo 'page introuvable 404 !';
    }

}


?>