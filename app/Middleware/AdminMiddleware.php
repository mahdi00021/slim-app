<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 05/08/2021
 * Time: 21:15
 */

namespace App\Middleware;


class AdminMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {


        if (isset($_SESSION['mobile']) != null && $_SESSION['role'] == 'admin' && $_SESSION['code'] != null) {


            $response = $next($request, $response);

            return $response;


        } elseif (isset($_SESSION['mobile']) != null && $_SESSION['role'] == 'admin' && $_SESSION['code'] == null) {

            $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('smsCode'));

            return $response = $response->withRedirect($uri);

        } else {

            $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('login'));

            return $response = $response->withRedirect($uri);
        }


    }
}