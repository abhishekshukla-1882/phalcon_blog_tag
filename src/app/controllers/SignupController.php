<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller{

    public function IndexAction(){

    }

    public function registerAction(){
        $user = new Users();

        $user->assign(
            $this->request->getPost(),
            [
                'username',
                'password'
            ]
        );

        $success = $user->save();

        $this->view->success = $success;

        if($success){
            $this->view->message = "Register succesfully";
        }else{
            $this->view->message = "Not Register succesfully due to following reason: <br>".implode("<br>", $user->getMessages());
        }
    }
}