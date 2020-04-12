<?php

use Core\App;
use Core\Database\{Connection, QueryBuilder};

App::bind('app', require __DIR__ . '/../config/app.php');
App::bind('database', new QueryBuilder(
    Connection::make(require __DIR__ . '/../config/database.php')
));

function view($name, $data = []) {
    extract($data);

    return require __DIR__ . "/../app/views/{$name}.view.php";
}

function redirect($path) {
    header("Location: /{$path}");
}
