<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 25/07/2021
 * Time: 10:03
 */

namespace App\Middleware;


use App\DataAccess\UserDataAccess;
use Psr\Container\ContainerInterface;

class VerifySMSMiddleware extends Middleware
{


    public function __invoke($request, $response, $next)
    {


        if (isset($_SESSION['mobile']) != null) {

            $response = $next($request, $response);

            return $response;

        }
        $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('login'));

        return $response = $response->withRedirect($uri);

    }
}