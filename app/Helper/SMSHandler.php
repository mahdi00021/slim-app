<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 25/07/2021
 * Time: 08:57
 */

namespace App\Helper;


class SMSHandler
{
    public $container;

    public function __construct($db)
    {
        $this->container = $db;
    }

    public function insertDbSms($user_id, $code)
    {

        $this->container->beginTransaction();
        $sql = "INSERT INTO tokens(user_id, code) VALUES('" . $user_id . "', '" . $code . "')";


        if ($this->container->prepare($sql)->execute() == TRUE) {

            $this->container->commit();
        } else {
            $this->container->rollBack();
            echo json_encode("Unknown Error Occured");
        }


    }

    public function sendMessage($mobile, $message)
    {

        $message = urlencode($message);
        $url = sprintf($_ENV['API'],
            $_ENV['AUTH_KEY'], $mobile, $message, $_ENV['SENDER_ID']);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

}