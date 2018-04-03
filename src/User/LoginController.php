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

    public function dashboard()
    {
        if (isset($_SESSION["login"])) {
            echo "Nutzer ist eingeloggt.";
        } else {
            header("Location: login");
        }
    }

    public function logout()
    {
        unset($_SESSION["login"]);
        header("Location: login");
    }

    public function login()
    {
        $error = null;

        if (!empty($_POST["username"]) AND !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $user = $this->usersRepository->findByUserName($username);

            if (!empty($user)) {
                if (password_verify($password, $user->password)) {
                    $_SESSION["login"] = $user->username;
                    session_regenerate_id(true);
                    header("Location: dashboard");
                    return;
                } else {
                    $error = "Passwörter stimmen nicht überein.";
                }
            } else {
                $error = "Der Nutzer konnte nicht gefunden werden.";
            }
        }

        $this->render("user/login", [
            "error" => $error
        ]);
    }
}
