<?php

use Phalcon\Mvc\Model;

class Posts extends Model
{
    public $post_id;
    public $title;
    public $content;
    public $user_id;
}