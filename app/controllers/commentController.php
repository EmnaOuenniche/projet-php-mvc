<?php

class commentController extends Controller{

    private $user;
    private $article;
    private $comment;

    public function __construct(){
        $this->user = $this->model('user');
        $this->article = $this->model('article'); 
        $this->comment = $this->model('comment'); 
    }


    public function add(){
        if($this->user->isConnected()){
            if(isset($_POST['comment']) && isset($_GET['user_id']) && isset($_GET['article_id'])){
                $this->comment->add($_GET['article_id'],$_GET['user_id'],$_POST['comment']);
                header('location:?controller=articleController&page=article&id='.$_GET['article_id']);
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    

}

?>