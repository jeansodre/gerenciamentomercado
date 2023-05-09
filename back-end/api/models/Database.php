<?php


class Database
{
    private $host = "localhost";
    private $port = "5432";
    private $username = "example_user";
    private $password = "example_password";
    private $database = "example_db";
    public $connection;

    public function getConnection()
    {
        $this->connection = null;

        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->database};";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->connection;
    }
}