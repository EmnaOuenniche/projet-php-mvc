<?php
class comment extends DataBase{

    public function __construct(){
        parent::__construct();
    }

    public function add($articleId,$userId,$comment){
        $res = $this->pdo->prepare("insert into article_comments(article_id,user_id,comment,date) values(?,?,?,?)");
        $res->execute(array($articleId,$userId,$comment,time()));
        return true;
    }
    public function getByArticleID($id){
        $res = $this->pdo->prepare("select * from article_comments,users where article_comments.article_id=? and article_comments.user_id = users.id");
        $res->execute(array($id));
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>