<?php

namespace App\User;

use App\Core\Controller;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
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
        $this->loginService->logout();
        header("Location: login");
    }

    public function login()
    {
        $error = null;

        if (!empty($_POST["username"]) AND !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($this->loginService->attempt($username, $password)) {
                header("Location: dashboard");
                return;
            } else {
                $error = true;
            }
        }

        $this->render("user/login", [
            "error" => $error
        ]);
    }
}
