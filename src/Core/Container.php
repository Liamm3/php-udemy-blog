<?php

namespace App\Core;

use PDO;
use PDOException;
use App\Post\PostsRepository;
use App\Post\CommentsRepository;
use App\Post\PostsController;
use App\User\UsersRepository;
use App\User\LoginController;
use App\User\LoginService;
use App\Post\PostsAdminController;

class Container
{
    private $receipts = [];
    private $instances = [];

    public function __construct()
    {
        $this->receipts = [
            "postsAdminController" => function() {
                return new PostsAdminController($this->make("postsRepository"));
            },
            "postsController" => function() {
                return new PostsController($this->make("postsRepository"), $this->make("commentsRepository"));
            },
            "postsRepository" => function() {
                return new PostsRepository($this->make("pdo"));
            },
            "commentsRepository" => function() {
                return new CommentsRepository($this->make("pdo"));
            },
            "usersRepository" => function() {
                return new UsersRepository($this->make("pdo"));
            },
            "loginController" => function() {
                return new LoginController($this->make("loginService"));
            },
            "loginService" => function() {
                return new LoginService($this->make("usersRepository"));
            },
            "pdo" => function() {
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "blog", "MgCTCN3EPwdngQCi");
                } catch (PDOException $error) {
                    echo "Verbindung zur Datenbank fehlgeschlagen! :(";
                    die();
                }
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
            }
        ];
    }

    public function make($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }

        if (isset($this->receipts[$name])) {
            $this->instances[$name] = $this->receipts[$name]();
        }

        return $this->instances[$name];
    }
}
