<?php
session_start();
use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->tum=Posts::find();
        // return '<h1>Hello World!</h1>';
    }
    // public function logoutAction(){
        
    // }
}