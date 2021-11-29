<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 25/07/2021
 * Time: 22:17
 */

use Jenssegers\Blade\Blade;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

$container = $app->getContainer();

$container['db'] = function ($container) {
    $db = $container['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['database'],
        $db['username'], $db['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['csrf'] = function ($container) {
    $guard = new \Slim\Csrf\Guard();
    $guard->setFailureCallable(function ($request, $response, $next) {
        $request = $request->withAttribute("csrf_status", false);
        return $next($request, $response);
    });
    return $guard;
};

$container['view'] = function ($container) {

    return new \App\Helper\ViewHandler();

};

$container['UserDataAccess'] = function ($container) {

    return new \App\DataAccess\UserDataAccess($container);

};

$container['SiteDataAccess'] = function ($container) {

    return new \App\DataAccess\SiteDataAccess($container);

};

$container['PriceDataAccess'] = function ($container) {

    return new \App\DataAccess\PriceDataAccess($container);

};


$container['validator'] = function ($container) {

    return new \App\Validation\Validator;

};

$container['upload_directory'] = __DIR__ . '/../public/uploads';

