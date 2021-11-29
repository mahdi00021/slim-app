<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 01/08/2021
 * Time: 15:08
 */


function setEnvironmentValue($key, $value)
{
    $path = __DIR__ . '/../' . '/.env';

    if (file_exists($path)) {
        if (isset($_ENV[$key])) {
            //replace variable if key exit
            file_put_contents($path, str_replace(
                "$key=" . $_ENV[$key], "$key=" . $value, file_get_contents($path)
            ));
        } else {
            //set if variable key not exit
            $file = file($path);
            $file[] = "$key=" . $value;
            file_put_contents($path, $file);
        }
    }
}
