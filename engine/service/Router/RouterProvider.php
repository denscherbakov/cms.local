<?php

namespace Engine\Service\Router;

use \Engine\Service\AbstractProvider;
use \Engine\Core\Router\Router;

class RouterProvider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'router';

    /**
     * @return mixed
     */
    public function init()
    {
        $router = new Router('yandex.ru');
        $this->di->set($this->serviceName, $router);
    }
}