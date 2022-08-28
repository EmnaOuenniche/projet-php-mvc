<?php

class article extends DataBase{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function add($title,$image,$content){
        $res = $this->pdo->prepare("insert into articles(title,image,content,date,user_id,status) values(?,?,?,?,?,?)");
        $res->execute(array($title,$image,$content,time(),$_SESSION['id'],$_SESSION['role'] == "1" ? 1 : 0));
        return true;
    }
    
    public function edit($id,$title,$image,$content){
        $res = $this->pdo->prepare("update articles set title = ? , image = ? , content = ? where id = ? ");
        $res->execute(array($title,$image,$content,$id));
        return true;
    }
    
    public function delete($id){
        $res = $this->pdo->prepare("delete from articles where id = ? ");
        return $res->execute(array($id));
    }

    public function getAll(){
        $res = $this->pdo->prepare("select * from articles");
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllVisible(){
        $res = $this->pdo->prepare("select * from articles where status = ?");
        $res->execute(array(1));
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $res = $this->pdo->prepare("select * from articles where id=?");
        $res->execute(array($id));
        return $res->fetch(PDO::FETCH_ASSOC);
    }
    public function getByUserId($id){
        $res = $this->pdo->prepare("select * from articles where user_id=?");
        $res->execute(array($id));
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByUserIdFiltred($id){
        $res = $this->pdo->prepare("select * from articles where user_id=?");
        $res->execute(array($id));
        return $res->fetch(PDO::FETCH_ASSOC);
    }
    public function approuveArticle($id){
        $res = $this->pdo->prepare("update articles set status = ? where id = ?");
        $res->execute(array(1,$id));
        return true;
    }
    public function count(){
        $res = $this->pdo->prepare("select * from articles");
        $res->execute();
        return count($res->fetchAll(PDO::FETCH_ASSOC));
    }
    public function deleteByUser($userId){
        $res = $this->pdo->prepare("delete from articles where user_id=?");
        return $res->execute(array($userId));
    }

}

?>