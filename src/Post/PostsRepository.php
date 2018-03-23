<?php

namespace App\Post;

use App\Core\Repository;

class PostsRepository extends Repository
{
    public function getTableName()
    {
        return "posts";
    }

    public function getModelName()
    {
        return "App\\Post\\PostModel";
    }
}
