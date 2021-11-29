<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 11:14
 */


session_start();

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createmutable(__DIR__ . '/../');
$dotenv->load();


$app = new \Slim\App([

    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => $_ENV['DRIVER'],
            'host' => $_ENV['HOST'],
            'database' => $_ENV['DATABASE'],
            'username' => $_ENV['USERNAME'],
            'password' => $_ENV['PASSWORD'],
            'charset' => $_ENV['CHARSET'],
            'collation' => $_ENV['COLLATION'],
            'prefix' => $_ENV['PREFIX'],
        ]
    ],


]);

require __DIR__ . '/../bootstrap/function.php';
require __DIR__ . '/../bootstrap/dependencies.php';

$app->add($container->csrf);

require __DIR__ . '/../app/route.php';
