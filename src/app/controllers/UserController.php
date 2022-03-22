<?php
use Phalcon\Mvc\Controller;


class UserController extends Controller
{
    public function indexAction()
    {
        $this->view->data = Users::find();
    }
    public function signupAction(){
        $user = new Users();
        // print_r($this->request->isPost('username'));
        // die();
        if($this->request->isPost('username')){

            $user->assign(
                $this->request->getPost(),
                    [
                        'username',
                        'password'
                    ]
                );
                $success = $user->save();
                if($success){
                    $message = "Succesfully Registered.!";
                }else{
                    $message = "There is some problem please check .!.";
                }
        $this->view->message = $message;
            
                    
        }
        
        // echo $message;
        // die();
    
    }
}