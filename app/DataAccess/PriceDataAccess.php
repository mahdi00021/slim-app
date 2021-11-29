<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 01/08/2021
 * Time: 16:59
 */

namespace App\DataAccess;


use App\Helper\FileHandler;
use Exception;
use PDO;
use PDOException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Slim\Http\UploadedFile;

class PriceDataAccess extends DataAccess
{

    public function insertPrice($params)
    {


        if ($params != null) {

            $this->db->beginTransaction();

            $sql = "INSERT INTO prices(site_id, title_fa,title_en, description, dimensions, price) VALUES(:site_id, :title_fa,:title_en, :description, :dimensions, :price)";

            $insert = $this->db->prepare($sql);

            $insert->bindValue(':site_id', $params['site_id'], PDO::PARAM_INT);
            $insert->bindValue(':title_fa', $params['title_fa'], PDO::PARAM_STR);
            $insert->bindValue(':title_en', $params['title_en'], PDO::PARAM_STR);
            $insert->bindValue(':description', $params['description'], PDO::PARAM_STR);
            $insert->bindValue(':dimensions', $params['dimensions'], PDO::PARAM_STR);
            $insert->bindValue(':price', $params['price'], PDO::PARAM_INT);

            if ($insert->execute() == TRUE) {

                $this->db->commit();
                return "درج شد";
            } else {

                $this->db->rollBack();
                return "عملیات درج ناموفق بود";
            }


        }
    }


    public function insertSitePic($request, $params)
    {

        try {
            $uploadedFiles = $request->getUploadedFiles();

            $this->db->beginTransaction();
            $sql = "INSERT INTO site_pics(title_fa, title_en, site_id) VALUES(:title_fa, :title_en, :site_id)";

            $insert = $this->db->prepare($sql);
            $insert->bindValue(':title_fa', $params['title_fa'], PDO::PARAM_STR);
            $insert->bindValue(':title_en', $params['title_en'], PDO::PARAM_STR);
            $insert->bindValue(':site_id', $params['site_id'], PDO::PARAM_INT);

            if ($insert->execute() == TRUE) {

                $uploadedFile = $uploadedFiles['image'];
                if ($uploadedFile->getError() === UPLOAD_ERR_OK) {

                    $id = $this->db->lastInsertId();

                   FileHandler::moveUploadedFile($params['site_id'], $id, $this->container->get('upload_directory'), $uploadedFile);

                }


                $this->db->commit();
                return "درج شد";

            } else {

                $this->db->rollBack();
                return "عملیات درج ناموفق بود";

            }
        } catch (NotFoundExceptionInterface $e) {
            die($e->getMessage());
        } catch (ContainerExceptionInterface $e) {
            die($e->getMessage());
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    public function getAllSite()
    {
        try {
            $sql = "SELECT site_name_en,id FROM sites";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = [];
            foreach ($rows as $row) {
                $data[] = $row;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $data;
    }


}