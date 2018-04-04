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

    public function update(PostModel $post)
    {
        $table = $this->getTableName();

        $statement = $this->pdo->prepare("UPDATE `{$table}` SET `content`=:content, `title`=:title WHERE `id`=:id ");
        $statement->execute([
            "content" => $post->content,
            "title" => $post->title,
            "id" => $post->id
        ]);
    }
}
