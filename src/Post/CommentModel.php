<?php

namespace App\Post;

use App\Core\Model;

class CommentModel extends Model
{
    public $id;
    public $content;
    public $post_id;
}
