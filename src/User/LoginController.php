<?php

namespace App\User;

use App\Core\Controller;

class LoginController extends Controller
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function login()
    {
        $this->render("user/login", []);
    }
}
