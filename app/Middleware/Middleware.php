<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 04/08/2021
 * Time: 01:14
 */

namespace App\Middleware;


use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

abstract class Middleware
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