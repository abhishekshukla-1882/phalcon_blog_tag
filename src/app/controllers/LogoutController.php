<?php 
use Phalcon\Mvc\Controller;
class LogoutController extends Controller
{
    public function indexAction()
    {
        session_destroy();
        header('Location:http://localhost:8080/');
    }
} 