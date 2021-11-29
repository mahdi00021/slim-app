<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 11:52
 */

namespace App\Controller;

use Respect\Validation\Validator as v;

class AuthController extends Controller
{


    public function dashboard($request, $response)
    {

        return $this->view->render($response, 'auth.profile');

    }

    public function login($request, $response)
    {

        return $this->view->render($response, 'auth.login', [
            "csrf" => $this->view->getCsrf($request, $this->container),
            "baseurl" => $request->getUri()->getBasePath()]);

    }

    public function actionLogin($request, $response)
    {

        $validator = $this->validator->validate($request,[
            "mobile" => v::noWhitespace()->notEmpty(),
        ]);

        $request = $this->csrf->generateNewToken($request);
        $params = $request->getParams();
        return $this->UserDataAccess->login($params, $response, $request);

    }

    public function register($request, $response)
    {

        return $this->view->render($response, 'auth.register', [
            "csrf" => $this->view->getCsrf($request, $this->container),
            "baseurl" => $request->getUri()->getBasePath()
        ]);

    }

    public function actionRegister($request, $response)
    {

        $validator = $this->validator->validate($request,[
            "mobile" => v::noWhitespace()->notEmpty(),
        ]);

        $request = $this->csrf->generateNewToken($request);
        $params = $request->getParams();

        return $this->UserDataAccess->register($params);

    }

    public function SmsVerify($request, $response)
    {

        return $this->view->render($response, 'auth.smsVerify', [
            "csrf" => $this->view->getCsrf($request, $this->container),
            "baseurl" => $request->getUri()->getBasePath()
        ]);

    }

    public function actionSmsVerify($request, $response)
    {

        $validator = $this->validator->validate($request,[
            "code" => v::noWhitespace()->notEmpty(),
        ]);

        $params = $request->getParams();
        return $this->UserDataAccess->smsVerify($params['code'], $response, $request);

    }

    public function logout($request, $response)
    {

        unset($_SESSION['mobile']);
        unset($_SESSION['code']);
        unset($_SESSION['role']);
        $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('login'));
        return $response = $response->withRedirect($uri);
    }


}