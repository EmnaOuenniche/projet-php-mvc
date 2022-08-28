<?php

class favorit extends DataBase{

    public function __construct(){
        parent::__construct();
    }

    public function add($articleId,$userId){
        $res = $this->pdo->prepare("select * from article_fav where article_id = ? and user_id = ?");
        $res->execute(array($articleId,$userId));
        if(count($res->fetchAll(PDO::FETCH_ASSOC))<1){
            $res = $this->pdo->prepare("insert into article_fav(article_id,user_id) values(?,?)");
            $res->execute(array($articleId,$userId));
            return true;
        }
    }

    public function remove($userId,$articleId){
        $res = $this->pdo->prepare("delete from article_fav where user_id = ? and article_id = ?");
        return $res->execute(array($userId,$articleId));
    }

    public function removeById($id){
        $res = $this->pdo->prepare("delete from article_fav where id = ?");
        return $res->execute(array($id));
    }

    public function isfavorit($userId,$articleId){
        $res = $this->pdo->prepare("select * from article_fav where article_id = ? and user_id = ?");
        $res->execute(array($articleId,$userId));
        if(count($res->fetchAll(PDO::FETCH_ASSOC))<1){
            return false;
        }else{
            return true;
        }
    }

    public function getFavoritsByUserId($userId){
        $res = $this->pdo->prepare("select * from article_fav where user_id = ?");
        $res->execute(array($userId));
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>