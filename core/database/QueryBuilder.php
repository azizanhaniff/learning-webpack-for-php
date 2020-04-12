<?php

namespace Core\Database;

use PDO;
use PDOException;

class QueryBuilder {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $class = false) {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        if(!$class) {
            return $statement->fetchAll(PDO::FETCH_CLASS);
        }

        return $statement->fetchAll(PDO::FETCH_CLASS, "App\\Models\\{$class}");
    }

    public function insert($table, $parameters) {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters)),
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch(PDOException $e) {
            die('Whoops, something went wrong.');
        }
    }
}
