<?php

namespace Engine;

use Engine\Core\Router\RouteDispatched;
use Engine\Helper\Common;

class Cms
{
    /**
     * @var
     */
    private $di;

    private $router;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     *
     */
    public function run()
    {
        try {
            $this->router->add('home', '/', 'HomeController:index');
            $this->router->add('product', '/product/12', 'ProductController:index');

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());

            if ($routerDispatch == null){
                $routerDispatch = new RouteDispatched('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;
            call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());
        } catch (\Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
}