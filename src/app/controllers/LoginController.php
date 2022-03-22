<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        $postdata = $_POST ?? array();
        $username = $_POST['username'];
        $password = $_POST["password"];
        // echo $password;
        print_r($postdata);
        // die();
      
        // if(count($postdata)>0){
        // print_r($username);
        // die();
        // $data = Users::find([
        //     'conditions' => 
        //         "username = ?1 AND
        //         password = ?2",
        //     "bind" => [1 => $username, 2=> $password]
            
        // ]);
        // $data = Users::query()
        //     ->where("username = '$username'")
        //     ->andWhere("password = '$password'")
        //     ->execute();
        // echo "<pre>";
        // print_r($data[0]);
        // echo "</pre>";

        // die();
        //return '<h1>Hello!!!</h1>';
        // }   
    }
    public function randomAction(){
        $postdata = $_POST ?? array();
        $username = $_POST['username'];
        $password = $_POST["password"];
        // echo $password;
        // print_r($password);
        // die();
        $data = Users::query()
            ->where("username = '$username'")
            ->andWhere("password = '$password'")
            ->execute();
        // print_r($data[0]->status);
        // die();
        // print_r($data->username, $data->user_id);
        if(count($data)>0){
            if(!isset($_SESSION['login'])){
                $_SESSION['login'] = array();
                $user_detail = array(
                    'username'=> $data[0]->username,
                    'id'=> $data[0]->user_id,
                    'user_is'=>$data[0]->status
                    // 'user_is'=>$data->user_is
                );
                // array_push($_SESSION['login'],$user_detail);
                $_SESSION['login'] = $user_detail;
                // print_r($_SESSION['login']);
                // die();
                header('Location: http://localhost:8080/');
                // die();
            }else{
                header('Location: http://localhost:8080/login');
            }
        }else{
            header('Location: http://localhost:8080/login');
        }
        // echo "<pre>";
        // print_r($data[0]->password);
        // echo "</pre>";

    }
}