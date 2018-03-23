<?php

namespace App\Post;

use App\Core\Controller;

class PostsController extends Controller
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function render($view, $params)
    {
        extract($params);
        include __DIR__ . "/../../views/{$view}.php";
    }

    public function index()
    {
        $posts = $this->postsRepository->fetchPosts();

        $this->render("post/index", [
            "posts" => $posts
        ]);
    }

    public function show()
    {
        $id = $_GET["id"];
        $post = $this->postsRepository->fetchPost($id);

        $this->render("post/post", [
            'post' => $post
        ]);
    }
}
