<?php

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username, $password)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    //no prevention of SQL injection
    // public function query($query)
    // {
    //     $statement = $this->connection->prepare($query);
    //     $statement->execute();

    //     return $statement;
    // }

    //prevention of SQL injection
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function getAll()
    {
        return $this->statement->fetchAll();
    }

    public function get()
    {
        return $this->statement->fetch();
    }
}
