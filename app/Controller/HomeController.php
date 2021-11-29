<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 11:52
 */

namespace App\Controller;


use App\Helper\ViewHandler;
use Psr\Container\ContainerInterface;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class HomeController extends Controller
{


    public function index($request, $response)
    {

        return $this->view->render($response, 'auth.profile', [
            "baseurl" => $request->getUri()->getBasePath()
        ]);

    }

}