<?php

class user extends DataBase{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function add($name,$email,$pass,$role){
        $res = $this->pdo->prepare("select count(*) from users where email = ?");
        $res->execute(array($email));
        if($res->fetchAll(PDO::FETCH_ASSOC)["0"]["count(*)"] > 0){
            return false;
        }
        $res = $this->pdo->prepare("insert into users(name,email,pass,role) values(?,?,?,?)");
        $res->execute(array($name,$email,md5($pass),$role));
        return true;
    }
    
    public function edit($id,$name,$email,$pass){

    }
    
    public function delete($id){
        
    }

    public function login($email,$pass){
        $res = $this->pdo->prepare("select count(*) from users where email = ? and pass = ?");
        $res->execute(array($email,md5($pass)));
        if($res->fetchAll(PDO::FETCH_ASSOC)["0"]["count(*)"] == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getUserDataByEmail($email){
        $res = $this->pdo->prepare("select id,name,email,role from users where email = ?");
        $res->execute(array($email));
        return $res->fetchAll(PDO::FETCH_ASSOC)["0"];
    }

    public function getUserDataById($id){
        $res = $this->pdo->prepare("select id,name,email,role from users where id = ?");
        $res->execute(array($id));
        return $res->fetchAll(PDO::FETCH_ASSOC)["0"];
    }
    
    public function isConnected(){
        if(isset($_SESSION['id']) && isset($_SESSION['role'])){
            return true;
        }else{
            return false;
        }
    }


    public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['role']);
        header('location:index.php?controller=userController&page=login');
    }


}

?>