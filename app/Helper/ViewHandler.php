<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 27/07/2021
 * Time: 00:47
 */

namespace App\Helper;


use Jenssegers\Blade\Blade;
use Slim\Http\Response;

class ViewHandler
{


    public function render($response, $template, $with = [])
    {
        $views = __DIR__ . '/../../resources/views';
        $cache = __DIR__ . '/../../storage/cache';

        $blade = (new Blade($views, $cache))->make($template, $with);
        $response = $response->getBody()->write($blade->render());
        return $response;
    }

    public function getCsrf($request, $container)
    {
        $nameKey = $container->csrf->getTokenNameKey();
        $valueKey = $container->csrf->getTokenValueKey();
        $name1 = $request->getAttribute($nameKey);
        $value = $request->getAttribute($valueKey);

        $csrf = [
            "nameKey" => $nameKey,
            "valueKey" => $valueKey,
            "name1" => $name1,
            "value" => $value
        ];

        return $csrf;
    }


}