<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 04/08/2021
 * Time: 01:21
 */

namespace App\DataAccess;


use Psr\Container\ContainerInterface;

abstract class DataAccess
{

    public $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

    }

    public function __get($name)
    {
        if ($this->container->has($name)) {

            return $this->container->get($name);

        }
    }
}