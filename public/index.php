<?php

use App\Kernel;

define('ROOT_PATH', realpath(dirname(__DIR__)));
require ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$kernel = new Kernel();
$kernel->register();

echo "Hello World!";
