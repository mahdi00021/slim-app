<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 11:48
 */

namespace App\DataAccess;


use App\Helper\SMSHandler;
use PDO;
use PDOException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class UserDataAccess extends DataAccess
{


    public function isVerification($mobile)
    {

        try {
            $sql = "SELECT * FROM users WHERE mobile= :mobile";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':mobile', $mobile, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $num_rows = $stmt->rowCount();
            if ($num_rows > 0) {
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['role'] = $row['role'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }


    public function register($params)
    {


        if ($params != null) {

            $query = "SELECT * FROM users WHERE mobile = :mobile ";
            $result = $this->db->prepare($query);
            $result->bindValue(':mobile', $params['mobile'], PDO::PARAM_STR);
            $result->execute();
            if ($result->rowCount() > 0) {
                return "<h3>user already exist!</h3>";
            } else {

                $this->container->db->beginTransaction();
                $sql = "INSERT INTO users(mobile, firstname, lastname,role) VALUES(:mobile,:firstname, :lastname,:role)";

                $insert = $this->db->prepare($sql);

                $insert->bindValue(':mobile', $params['mobile'], PDO::PARAM_STR);
                $insert->bindValue(':firstname', $params['firstname'], PDO::PARAM_STR);
                $insert->bindValue(':lastname', $params['lastname'], PDO::PARAM_STR);
                $insert->bindValue(':role', 2, PDO::PARAM_INT);

                if ($insert->execute() == TRUE) {

                    $this->db->commit();
                    return "درج شد";
                } else {
                    $this->db->rollBack();
                    return " عملیات درج ناموفق بود";
                }

            }
        }
    }

    public function login($params, $response, $request)
    {

        try {
            if ($params['mobile'] != null || $params['mobile'] != '') {
                if ($this->isVerification($params['mobile'])) {


                    $_SESSION['mobile'] = $params['mobile'];

                    $code = random_int(100000, 999999);

                    $msg = "Your Code is: " . $code;


                    $sms = new SMSHandler($this->db);

                    $sms->insertDbSms($this->getUserId($_SESSION['mobile']), $code);
                    $sms->sendMessage($_SESSION['mobile'], $msg);

                    $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('smsCode'));


                    return $response = $response->withRedirect($uri);

                } else {

                    $params['firstname'] = "";
                    $params['lastname'] = "";

                    $this->register($params);

                }
            }
        } catch (NotFoundExceptionInterface $e) {
        } catch (ContainerExceptionInterface $e) {
        } catch (\Exception $e) {
        }

    }

    public function smsVerify($code, $response, $request)
    {

        try {
            if ($code != null && $code != '' && $_SESSION['mobile'] != null) {

                try {
                    $query = "SELECT * FROM tokens WHERE user_id = :user_id AND date >= NOW() - INTERVAL 2 MINUTE";

                    $result = $this->db->prepare($query);
                    $result->bindValue(':user_id', $this->getUserId($_SESSION['mobile']), PDO::PARAM_STR);

                    if ($result->execute() == true) {
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        if (strval($row['code']) == strval($code)) {

                            $_SESSION['code'] = $code;
                            if ($_SESSION['role'] == 'admin') {
                                $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('dashboard'));

                                return $response = $response->withRedirect($uri);
                            } else {
                                $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('dashboardUser'));

                                return $response = $response->withRedirect($uri);
                            }


                        } else {

                            $uri = $request->getUri()->withPath($this->container->get('router')->pathFor('login'));

                            return $response = $response->withRedirect($uri);

                        }
                    }

                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
        } catch (NotFoundExceptionInterface $e) {
        } catch (ContainerExceptionInterface $e) {
        }
    }

    public function getUserId($mobile)
    {
        $query = "SELECT * FROM users WHERE mobile = :mobile";

        $result = $this->db->prepare($query);
        $result->bindValue(':mobile', $mobile, PDO::PARAM_STR);

        if ($result->execute() == true) {
            $row = $result->fetch(PDO::FETCH_ASSOC);

            return $row['id'];
        }

    }
}

