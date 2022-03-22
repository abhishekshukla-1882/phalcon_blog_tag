<?php
use Phalcon\Mvc\Controller;


class EditController extends Controller
{
    public function indexAction()
    {
        $id= $_SESSION['login']['id'];
        // echo $id;
        // die();
        $this->view->data = Posts::query()
        ->where("user_id = '$id'")
        ->execute();
    }
    public function editAction(){
        if(isset($_POST['edit'])){
            $val = $_POST['edit'];
            $val2 = $_POST['idd'];
            // print_r($val2);
            // die();
            // $data = $this->model('Posts')::find_by_post_id($val2);
            $this->view->data = Posts::find($val2);


            // echo $val2;
            // die();
            // echo $val;
            // $this->view('edit/edit2');
        }
        if(isset($_POST['delete'])){
            // echo "delete";
            $val = $_POST['edit'];
            $val2 = $_POST['idd'];
            // echo $val2;
            // die();
            $data = Posts::find($val2);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die();

            $data->delete();
            header('Location: http://localhost:8080/edit');



            // $data->delete();
            // $this->view('pages/edit',$data);


        }
    }
    public function updateAction(){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $post_id = $_POST['idd'];
        // echo $post_id;
        // die();
        $data = Posts::query()
        ->where("post_id = '$post_id'")
        ->execute();
        // print_r($data[0]->title);
        // die();
        $data[0]->title = $title;
        $data[0]->content = $content;
        $data[0]->save();
        header('Location: http://localhost:8080/edit');



    }
}