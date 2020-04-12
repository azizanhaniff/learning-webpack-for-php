<?php

namespace Core\Database;

use PDO;
use PDOException;

class Connection {
    public static function make($database, $connection = 'mysql') {
        try {
            return new PDO(
                "{$database[$connection]['driver']}:host={$database[$connection]['host']};dbname={$database[$connection]['database']}",
                $database[$connection]['username'],
                $database[$connection]['password'],
                $database[$connection]['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
