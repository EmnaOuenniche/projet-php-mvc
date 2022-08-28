<?php

class articleController extends Controller {

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
            $this->view('home/article/addArticle');
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function myArticles(){
        if($this->user->isConnected()){
            $myArticlesList = $this->article->getByUserId($_SESSION['id']);
            
            for($i=0;$i<count($myArticlesList);$i++){
                $myArticlesList[$i]['image'] = "assets/uploads/".$myArticlesList[$i]['image'];
                $myArticlesList[$i]['date']  = date('d/m/Y H:i:s',$myArticlesList[$i]['date']);
                if($myArticlesList[$i]['status'] == 0){
                    $myArticlesList[$i]['status'] = "Pas accepté";
                }else{
                    $myArticlesList[$i]['status'] = "Publié";
                }
                $myArticlesList[$i]['user'] = ($this->user->getUserDataById($_SESSION['id']))['name'];
            }
            //print(count($myArticlesList));
            //print_r($myArticlesList);
            $this->view('home/article/listArticles',$data = ["articles"=>$myArticlesList]);
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }

    public function article(){
        if($this->user->isConnected()){
            $articleID = $_GET['id'];
            $articleDetailes = $this->article->getById($articleID);
            $articleDetailes['image'] = "assets/uploads/".$articleDetailes['image'];
            $articleDetailes['date']  = date('d/m/Y H:i:s',$articleDetailes['date']);
            $articleDetailes['user'] = ($this->user->getUserDataById($articleDetailes['user_id']))['name'];
            $articleDetailes['comments'] = $this->comment->getByArticleID($articleDetailes['id']);
            $articleDetailes['note'] = $this->note->getNoteByUserId($articleDetailes['id'],$_SESSION['id']);
            $articleDetailes['AVGnote'] =$this->note->getNoteAVG($articleDetailes['id']);
            $articleDetailes['notesCount'] =$this->note->getNotesCount($articleDetailes['id']);
            $articleDetailes['isFavorit'] = $this->favorit->isfavorit($_SESSION['id'],$articleDetailes['id']);
            $this->view('home/article/showArticle',$data = ["article"=>$articleDetailes]);
        }else{
            header('location:index.php?controller=userController&page=login');
        }
        
    }

}




?>