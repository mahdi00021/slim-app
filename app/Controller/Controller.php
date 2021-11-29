<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 03/08/2021
 * Time: 19:51
 */

namespace App\Controller;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;


abstract class Controller
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
