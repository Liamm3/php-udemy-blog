<?php

namespace App\Post;

use PDO;

class PostsRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchPosts()
    {
        $statement = $this->pdo->query("SELECT * FROM `posts`");
        $post = $statement->fetchAll(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        var_dump($post);
        return $post;
    }

    public function fetchPost($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `posts` WHERE id=:id");
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        $post = $statement->fetch(PDO::FETCH_CLASS);

        var_dump($post);

        return $post;
    }
}
