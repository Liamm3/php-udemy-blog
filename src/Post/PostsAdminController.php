<?php

namespace App\Post;

use App\Core\Controller;

class PostsAdminController extends Controller
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function index()
    {
        $all = $this->postsRepository->all();
        $this->render("post/admin/index", [
            "all" => $all
        ]);
    }
}
