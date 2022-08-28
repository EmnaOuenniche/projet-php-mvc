<?php

class userController extends Controller {

    public function index(){
        $user = $this->model('user');
        $user->name = $_GET['name'];
        
        $data = ["name"=>$user->name];
        
        $this->view('home/index',$data);
    }

    public function login(){
        if(!$this->isConnected()){
            //not connected user
            if(isset($_POST['email']) && isset($_POST['pass'])){
                //POST REQUEST
                $user = $this->model('user');
                $result = $user->login($_POST['email'],$_POST['pass']);
                if($result){
                    $userData = $user->getUserDataByEmail($_POST['email']);
                    $_SESSION['id'] = $userData['id'];
                    $_SESSION['role'] = $userData['role'];
                    header('location:index.php?controller=homeController');
                }else{
                    //GET REQUEST
                    header('location:index.php?controller=userController&page=login&error=login');
                }
            }else{
                $this->view('home/user/login');
            }
        }else{
            //connected user
            header('location:index.php?controller=homeController');
        }
    }

    public function register(){
        if(!$this->isConnected()){
            if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['pass'])){
                //POST REQUEST
                $user   = $this->model('user');
                
                $result = $user->add($_POST['name'],$_POST['email'],$_POST['pass'],$_POST['role'] == "a" ? 3 : 2);
                
                if($result){
                    header('location:index.php?controller=userController&page=login');
                }else{
                    header('location:index.php?controller=userController&page=register&error=email');
                }
            }else{
                //GET REQUEST
                $this->view('home/user/register');
            }
        }else{
            header('location:index.php?controller=homeController');
        }
    }

    public function myAccount(){
        if($this->isConnected()){
            // if(isset($_POST['updateData'])){

            // }
            $this->view('home/user/myAccount');
        }else{
            header('location:index.php?controller=userController&page=login');
        }
    }


    public function isConnected(){
        $user   = $this->model('user');
        return $user->isConnected();
    }

    public function logout(){
        $user   = $this->model('user');
        return $user->logout();
    }
}


?>