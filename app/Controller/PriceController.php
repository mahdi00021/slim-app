<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 01/08/2021
 * Time: 17:22
 */

namespace App\Controller;


use App\DataAccess\PriceDataAccess;
use App\Helper\ViewHandler;
use PDO;
use PDOException;
use Psr\Container\ContainerInterface;
use Respect\Validation\Validator as v;

class PriceController extends Controller
{

    public function addPrice($request, $response)
    {

        $validator = $this->validator->validate($request,[
            "site_id" => v::noWhitespace()->notEmpty(),
            "title_fa" => v::noWhitespace()->notEmpty(),
            "title_en" => v::noWhitespace()->notEmpty(),
            "description" => v::noWhitespace()->notEmpty(),
            "dimensions" => v::noWhitespace()->notEmpty(),
            "price" => v::noWhitespace()->notEmpty(),
        ]);

        $request = $this->csrf->generateNewToken($request);
        $params = $request->getParams();
        return $this->PriceDataAccess->insertPrice($params);

    }

    public function price($request, $response)
    {

        return $this->view->render($response, 'ads.insertPrice', [
            "csrf" => $this->view->getCsrf($request, $this->container),
            "data" =>  $this->PriceDataAccess->getAllSite(),
            "baseurl" => $request->getUri()->getBasePath()

        ]);

    }


    public function addSitePic($request, $response)
    {

        $validator = $this->validator->validate($request,[
            "title_fa" => v::noWhitespace()->notEmpty(),
            "title_en" => v::noWhitespace()->notEmpty(),
            "site_id" => v::noWhitespace()->notEmpty(),

        ]);

        $request = $this->csrf->generateNewToken($request);
        $params = $request->getParams();
        return $this->PriceDataAccess->insertSitePic($request, $params);
    }

    public function sitePic($request, $response)
    {

        return $this->view->render($response, 'ads.insertSitePic', [
            "csrf" => $this->view->getCsrf($request, $this->container),
            "data" => $this->PriceDataAccess->getAllSite(),
            "baseurl" =>  $request->getUri()->getBasePath()

        ]);

    }
}