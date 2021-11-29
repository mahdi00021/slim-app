<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 11:15
 */

use App\Controller\AuthController;
use App\Controller\PriceController;
use App\Controller\HomeController;
use App\Controller\SiteController;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\VerifySMSMiddleware;

$app->get('/', HomeController::class . ':index')->setName("home");

/**
 *
 * Admin Panel
 *
 */
$app->group('/admin/panel', function () use ($app) {

    $app->get('/dashboard', HomeController::class . ':index')->setName("dashboard");

    $app->get('/NewSite', SiteController::class . ':NewSite')->setName("NewSite");
    $app->post('/addNewSite', SiteController::class . ':addNewSite');

    $app->get('/NewPrice', PriceController::class . ':Price')->setName("Price");
    $app->post('/NewPrice', PriceController::class . ':addPrice');

    $app->get('/SitePic', PriceController::class . ':SitePic')->setName("SitePic");
    $app->post('/NewSitePic', PriceController::class . ':addSitePic');

})->add(new AdminMiddleware($container));


/**
 *
 * User Panel
 *
 */
$app->group('/user/panel', function () use ($app) {

    $app->get('/dashboard', HomeController::class . ':index')->setName("dashboardUser");

})->add(new AuthMiddleware($container));


/**
 *
 * SMS Verify Code
 *
 */
$app->group('/verify', function () use ($app) {

    $app->get('/smsVerifyCode', AuthController::class . ':SmsVerify')->setName("smsCode");
    $app->post('/smsVerifyCode', AuthController::class . ':actionSmsVerify');

})->add(new VerifySMSMiddleware($container));



$app->get('/login', AuthController::class . ':login')->setName("login");
$app->post('/login', AuthController::class . ':actionLogin');
$app->get('/logout', AuthController::class . ':logout');


