<?php

namespace App\User;

use PDO;
use App\Core\Repository;

class UsersRepository extends Repository
{
    public function getTableName()
    {
        return "users";
    }

    public function getModelName()
    {
        return "App\\User\\UserModel";
    }

    public function findByUserName($username)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();

        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE username=:username");
        $statement->execute(["username" => $username]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        $user = $statement->fetch(PDO::FETCH_CLASS);
        return $user;
    }
}
