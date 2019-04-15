<?php

//Database connection
class DBConnect {
    private $host = "localhost";
    private $database   = "hometicket";
    private $username = "root";
    private $password = "";
    private $charset = "utf8mb4";
    public $pdo;

    //Connect function to connect to database
    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}
