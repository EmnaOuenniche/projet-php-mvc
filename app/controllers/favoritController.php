<?php

class favoritController extends Controller{

    private $user;
    private $article;
    private $favorit;
    public function __construct(){
        $this->user = $this->model('user');
        $this->article = $this->model('article'); 
        $this->favorit = $this->model('favorit'); 
    }

    public function add(){
        if($this->user->isConnected()){
            if(isset($_GET['user_id']) && isset($_GET['article_id'])){
                $this->favorit->add($_GET['article_id'],$_GET['user_id']);
                header('location:?controller=articleController&page=article&id='.$_GET['article_id']);
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function remove(){
        if($this->user->isConnected()){
            if(isset($_GET['user_id']) && isset($_GET['article_id'])){
                $this->favorit->remove($_GET['user_id'],$_GET['article_id']);
                header('location:?controller=favoritController&page=listFavorit');
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function removeById(){
        if($this->user->isConnected()){
            if(isset($_GET['user_id']) && isset($_GET['article_id'])){
                $this->favorit->remove($_GET['user_id'],$_GET['article_id']);
                header('location:?controller=favoritController&page=listFavorit');
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function listFavorit(){
        if($this->user->isConnected()){
            $favorisList = $this->favorit->getFavoritsByUserId($_SESSION['id']);
            $this->view('home/favorit/listFavorit',$data = ["articles"=>$favorisList]);
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }
}

?>