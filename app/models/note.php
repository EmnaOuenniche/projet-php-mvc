<?php

class note extends DataBase{

    public function __construct(){
        parent::__construct();
    }

    public function add($articleId,$userId,$note){
        $res = $this->pdo->prepare("select * from article_notes where article_id = ? and user_id = ?");
        $res->execute(array($articleId,$userId));
        if(count($res->fetchAll(PDO::FETCH_ASSOC))>0){
            echo 'update note';
            //update
            $res = $this->pdo->prepare("update article_notes set note = ? where user_id = ? and article_id = ? ");
            $res->execute(array($note,$userId,$articleId));
            return true;
        }else{
            //insert
            echo 'new note';
            $res = $this->pdo->prepare("insert into article_notes(article_id,user_id,note) values(?,?,?)");
            $res->execute(array($articleId,$userId,$note));
            return true;
        }
    }

    public function getNoteByUserId($articleId,$userId){
        $res = $this->pdo->prepare("select * from article_notes where article_id = ? and user_id = ?");
        $res->execute(array($articleId,$userId));
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        if(count($result)>0){
            return($result[0]['note']);
        }else{
            return 0;
        }
    }

}

?>