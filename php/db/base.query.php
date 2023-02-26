<?php

namespace db;

use PDO;

class BaseQuery
{

    private $conn;
    private $result;

    public function __construct(string $host = 'localhost', string $port = "8889", string $dbName = "my_todo_app", string $username = "test_user", string $password = "pwd")
    {
        $dsn = "mysql:host={$host};port={$port};dbname={$dbName};";
        $this->conn = new PDO($dsn, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }


    public function select(string $sql = "", array $params=[])
    {
        $stmt = $this->executeSql($sql, $params);
        return $stmt->fetchAll();
    }


    public function selectOne(string $sql="", array $params=[])
    {
        $this->result = $this->select($sql, $params);
        return count($this->result) > 0 ? $this->result[0] : false;
    }


    public function executeSql(string $sql="", array $params=[])
    {
        $stmt = $this->conn->prepare($sql);
        $this->result = $stmt->execute($params);
        return $stmt;
    }

    public function transaction()
    {
        $this->conn->beginTransaction();
    }


    public function commit()
    {
        $this->conn->commit();
    }


    public function rollback()
    {
        $this->conn->rollback();
    }
}
