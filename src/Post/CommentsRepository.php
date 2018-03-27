<?php

namespace App\Post;

use PDO;
use App\Core\Repository;

class CommentsRepository extends Repository
{
    public function getTableName()
    {
        return "comments";
    }

    public function getModelName()
    {
        return "App\\Post\\CommentModel";
    }

    public function insertForPost($postId, $content)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();

        $statement = $this->pdo->prepare("INSERT INTO `$table` (`content`, `post_id`) VALUES (:content, :postId)");
        $statement->execute([
            "content" => $content,
            "postId" => $postId
        ]);

    }

    public function allByPost($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `{$this->getTableName()}` WHERE post_id=:id");
        $statement->execute(["id" => $id]);
        $comments = $statement->fetchAll(PDO::FETCH_CLASS, $this->getModelName());
        return $comments;
    }
}
