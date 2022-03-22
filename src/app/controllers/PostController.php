<?php

use Phalcon\Mvc\Controller;

class PostController extends Controller
{
    public function indexAction()
    {
        //return '<h1>Hello!!!</h1>';
    }
    public function pstAction(){
        // $postdata = $_POST ?? array();
        $post = new Posts();
        // $title = $_POST['title'];
        // $content = $_POST["content"];
        // $user_id = $_POST["id"];
        // print_r($postdata);
        // die();
        $post->assign(
            $this->request->getPost(),
                [
                    'title',
                    'content',
                    'user_id'
                ]
            );
        // $this->view->post->title = $title;
        // $this->view->post->content = $content;
        // $this->view->post->user_id = $user_id;
        // $post->save();
        // );
        // print_r($post);
        // die();
        $success = $post->save();
        header('Location: http://localhost:8080/post');
        // $this->view->success = $success;

        if($success){
            $this->view->message = "Post succesfully";
        }else{
            $this->view->message = "not Posted: <br>".implode("<br>", $post->getMessages());
        }
    }


}