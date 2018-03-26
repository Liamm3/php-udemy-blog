<?php

namespace App\Core;

use PDO;

abstract class Repository
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    abstract public function getTableName();

    abstract public function getModelName();

    public function all()
    {
        $statement = $this->pdo->query("SELECT * FROM `{$this->getTableName()}`");
        $post = $statement->fetchAll(PDO::FETCH_CLASS, $this->getModelName());
        return $post;
    }

    public function find($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `{$this->getTableName()}` WHERE id=:id");
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $this->getModelName());
        $post = $statement->fetch(PDO::FETCH_CLASS);
        return $post;
    }
}