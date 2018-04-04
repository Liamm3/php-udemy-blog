<?php

namespace App\User;

class LoginService
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function attempt($username, $password)
    {
        $user = $this->usersRepository->findByUserName($username);

        if (empty($user)) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            $_SESSION["login"] = $user->username;
            session_regenerate_id(true);
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION["login"]);
    }
}
