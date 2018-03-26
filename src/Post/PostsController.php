<?php

namespace App\Post;

use App\Core\Controller;

class PostsController extends Controller
{
    private $postsRepository;
    private $commentsRepository;

    public function __construct(PostsRepository $postsRepository, CommentsRepository $commentsRepository)
    {
        $this->postsRepository = $postsRepository;
        $this->commentsRepository = $commentsRepository;
    }

    public function render($view, $params)
    {
        extract($params);
        include __DIR__ . "/../../views/{$view}.php";
    }

    public function index()
    {
        $posts = $this->postsRepository->all();

        $this->render("post/index", [
            "posts" => $posts
        ]);
    }

    public function show()
    {
        $id = $_GET["id"];
        $post = $this->postsRepository->find($id);


        $comments = $this->commentsRepository->allByPost($id);

        $this->render("post/post", [
            "post" => $post,
            "comments" => $comments
        ]);
    }
}
