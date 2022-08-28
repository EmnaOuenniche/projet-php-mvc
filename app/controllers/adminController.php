<?php

class adminController extends Controller{

    private $user;
    private $article;
    private $comment;
    private $note;
    private $favorit;

    public function __construct(){
        $this->user    = $this->model('user');
        $this->article = $this->model('article');
        $this->comment = $this->model('comment'); 
        $this->note    = $this->model('note');
        $this->favorit = $this->model('favorit');
    }



    public function dashboard(){
        // statistics 
    }

    public function listArticles(){
        //list all articles

        if($this->user->isConnected() && $_SESSION['role'] == "1"){
            $ArticlesList = $this->article->getAll();
            
            for($i=0;$i<count($ArticlesList);$i++){
                $ArticlesList[$i]['image'] = "assets/uploads/".$ArticlesList[$i]['image'];
                $ArticlesList[$i]['date']  = date('d/m/Y H:i:s',$ArticlesList[$i]['date']);
                if($ArticlesList[$i]['status'] == 0){
                    $ArticlesList[$i]['status'] = "no";
                }else{
                    $ArticlesList[$i]['status'] = "Publié";
                }
                $ArticlesList[$i]['user'] = ($this->user->getUserDataById($ArticlesList[$i]['user_id'] ))['name'];
            }
            $this->view('admin/articles',$data = ["articles"=>$ArticlesList]);
        }else{
            header('location:index.php?controller=userController&page=login');
        }

    }
    
    public function listUsers(){

    }

    public function approuve(){
        if($this->user->isConnected() && $_SESSION['role'] == "1"){
            if(isset($_GET['id'])){
                $this->article->approuveArticle($_GET['id']);
                header('location:?controller=adminController&page=listArticles');
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function comments(){
        if($this->user->isConnected() && $_SESSION['role'] == "1"){
            if(isset($_GET['id'])){
                $comments = $this->comment->getByArticleID($_GET['id']);
                for($i=0;$i<count($comments);$i++){
                    $comments[$i]['name'] = $this->user->getUserDataById($comments[$i]['user_id'])['name'];
                }
                $this->view('admin/comments',$data = ["comments"=>$comments]);
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function removeComment(){
        if($this->user->isConnected() && $_SESSION['role'] == "1"){
            if(isset($_GET['id'])){
                $comments = $this->comment->delete($_GET['id']);
                header('location:?controller=adminController&page=listArticles');
            }
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }
    

}

?>