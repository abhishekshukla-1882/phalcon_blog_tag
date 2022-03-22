<?php
use Phalcon\Mvc\Controller;


class DashController extends Controller
{
    public function indexAction()
    {

        $this->view->pst=Posts::find();
        // return '<h1>Hello World!</h1>';
    }
    public function authAction(){
        $val = $_POST['submit'];
        $id = $_POST['idd'];
        // echo $id;
         $this->view->user = Posts::find($id);
        // print_r($user);
        $this->view->user[0]->status = $val;
        $this->view->user[0]->save();
        header('Location: http://localhost:8080/dash');

        // die();
    }
}