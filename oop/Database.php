<?php

class Database
{
    /**
     * @var mysqli
     */
    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', 'root', 'HistoryResults');
        if (!$this->connection) {
            die('Unable to connect');
        }
    }

    /**
     * @param int $number1
     * @param int $number2
     * @param int $number3
     * @return bool|mysqli_result
     */
    public function insertResult($number1, $number2, $number3)
    {
        return $this->connection->query("INSERT INTO list (number, number2, answer) VALUES ($number1, $number2, $number3)");
    }

    public function getResults()
    {
        return $this->connection->query('SELECT * FROM list');
    }
}
