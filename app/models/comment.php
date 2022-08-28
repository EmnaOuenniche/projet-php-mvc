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
        $res = $this->pdo->prepare("select * from article_comments where article_id=?");
        $res->execute(array($id));
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id){
        $res = $this->pdo->prepare("delete from article_comments where id = ?");
        return $res->execute(array($id));
    }
    public function deleteByUser($userId){
        $res = $this->pdo->prepare("delete from article_comments where user_id=?");
        return $res->execute(array($userId));
    }
    public function count(){
        $res = $this->pdo->prepare("select * from article_comments");
        $res->execute();
        return count($res->fetchAll(PDO::FETCH_ASSOC));
    }

}

?>