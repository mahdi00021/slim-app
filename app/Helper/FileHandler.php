<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 05/08/2021
 * Time: 20:00
 */

namespace App\Helper;


use Slim\Http\UploadedFile;

class FileHandler
{

    public static function moveUploadedFile($site_id, $id, $directory, UploadedFile $uploadedFile)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $filename = 'pic_' . $site_id . '_' . $id . '.' . $extension;
        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }
}