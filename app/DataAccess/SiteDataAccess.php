<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 03/08/2021
 * Time: 16:15
 */

namespace App\DataAccess;


use PDO;
use Slim\Http\UploadedFile;

class SiteDataAccess extends DataAccess
{

    public function addSite($request, $response, $params)
    {


        if ($params != null) {


            $this->db->beginTransaction();

            $sql = "INSERT INTO sites(site_name_fa,site_name_en, alexa_local_rank, alexa_global_rank, site_url) VALUES(:site_name_fa,:site_name_en, :alexa_local_rank, :alexa_global_rank, :site_url)";

            $insert = $this->db->prepare($sql);
            $insert->bindValue(':site_name_fa', $params['site_name_fa'], PDO::PARAM_STR);
            $insert->bindValue(':site_name_en', $params['site_name_en'], PDO::PARAM_STR);
            $insert->bindValue(':alexa_local_rank', $params['alexa_local_rank'], PDO::PARAM_INT);
            $insert->bindValue(':alexa_global_rank', $params['alexa_global_rank'], PDO::PARAM_INT);
            $insert->bindValue(':site_url', $params['site_url'], PDO::PARAM_STR);

            if ($insert->execute() == TRUE) {
                $this->db->commit();
                return "درج شد";

            } else {
                $this->db->rollBack();
                return "عملیات درج ناموفق بود";
            }


        }


    }


}