<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 15:10
 */

namespace App\Middleware;


use App\DataAccess\UserDataAccess;
use App\Helper\SMSHandler;
use Illuminate\Container\Util;
use Psr\Container\ContainerInterface;


class AuthMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {


        if (isset($_SESSION['mobile']) != null) {


            if (!$this->UserDataAccess->isVerification($_SESSION['mobile'])) {


                $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('login'));

                return $response = $response->withRedirect($uri);

            } else if (isset($_SESSION['code']) == null) {


                $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('smsCode'));

                return $response = $response->withRedirect($uri);


            } else {

                $response = $next($request, $response);

                return $response;
            }


        }
        $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('login'));

        return $response = $response->withRedirect($uri);


    }
}