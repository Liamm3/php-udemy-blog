<?php

namespace App\Post;

class PostsController
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function index()
    {
        $res = $this->postsRepository->fetchPosts();

        echo "PostsController->index()";
    }
}
