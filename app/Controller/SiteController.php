<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 03/08/2021
 * Time: 16:15
 */

namespace App\Controller;


use App\Helper\ViewHandler;
use Psr\Container\ContainerInterface;
use Respect\Validation\Validator as v;


class SiteController extends Controller
{


    public function addNewSite($request, $response)
    {

        $validator = $this->validator->validate($request,[
            "site_name_fa" => v::noWhitespace()->notEmpty(),
            "site_name_en" => v::noWhitespace()->notEmpty(),
            "alexa_local_rank" => v::noWhitespace()->notEmpty(),
            "alexa_global_rank" => v::noWhitespace()->notEmpty(),
            "site_url" => v::noWhitespace()->notEmpty(),
        ]);

        $request = $this->csrf->generateNewToken($request);
        $params = $request->getParams();
        return $this->SiteDataAccess->addSite($request, $response, $params);

    }

    public function newSite($request, $response)
    {

        return $this->view->render($response, 'ads.insertSite', [
            "csrf" => $this->view->getCsrf($request, $this->container),
            "baseurl" => $request->getUri()->getBasePath()
        ]);

    }

}