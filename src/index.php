<?php

use Core\{Router, Request};

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../core/bootstrap.php';

Router::load(__DIR__ . '/../app/routes.php')->direct(Request::uri(), Request::method());
