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

    public function addArticle(){
        if($this->user->isConnected()){
            if(isset($_POST['title']) || isset($_FILES["image"]) || isset($_POST['content'])){
                
                $filename = rand(1,10000).'-'.rand(1,10000).'-'.time().'-'.rand(1,10000).'-'.basename($_FILES["image"]["name"]) ;
                $uploadfile = "./assets/uploads/".$filename;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadfile)) {
                    $image = $filename;
                } else {
                    $image = "";
                }

                $this->article->add($_POST['title'],$image,$_POST['content']);
            }
            $this->view('admin/addArticle');
        }else{
            header('location:index.php?controller=userController&page=login');
        }
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

    public function editArticle($articleId){

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


    public function statistiques(){
        if($this->user->isConnected() && $_SESSION['role'] == "1"){

            $statistics = [
                "users"=> $this->user->count(),
                "comments"=> $this->comment->count(),
                "articles"=>$this->article->count(),
                "notes"=>$this->note->count(),
            ];
            $this->view('admin/statistiques',$data=["stats"=>$statistics]);
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function users(){
        if($this->user->isConnected() && $_SESSION['role'] == "1"){
            $listUsers = $this->user->getAll();
            $this->view('admin/users',$data=["users"=>$listUsers]);
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function deleteUser(){
        if($this->user->isConnected() && $_SESSION['role'] == "1"){
            if(isset($_GET['id'])){
                $deleteduser = $this->user->delete($_GET['id']); 
                //delete all user comments
                //delete all user articles 
                //delete all users articles comments

                header('location:?controller=adminController&page=users');
            }
            
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }
    

}

?>