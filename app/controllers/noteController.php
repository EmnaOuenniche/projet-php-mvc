<?php

class noteController extends Controller{

    private $user;
    private $note;
    public function __construct(){
        $this->user = $this->model('user');
        $this->note = $this->model('note'); 
    }

    public function add(){
        if($this->user->isConnected()){
            if(isset($_GET['note'])&& isset($_GET['user_id']) && isset($_GET['article_id'])){
                $this->note->add($_GET['article_id'],$_GET['user_id'],$_GET['note']);
                header('location:?controller=articleController&page=article&id='.$_GET['article_id']);
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }
}

?>