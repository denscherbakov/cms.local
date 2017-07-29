<?php

namespace Engine\Core\Router;

class UriDispatcher
{
    private $methods = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET'   => [],
        'POST'  => []
    ];

    private $patterns = [
        'int' => '[0-9]+'
    ];

    /**
     * @param $key
     * @param $pattern
     */
    public function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array|mixed
     */
    private function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    public function register($method, $pattern, $controller)
    {
        var_dump($method);
        var_dump($pattern);
        var_dump($controller);die;
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    /**
     * @param $method
     * @param $uri
     * @return RouteDispatched
     */
    public function dispatch($method, $uri)
    {
        $routes = $this->routes(strtoupper($method));

        if (array_key_exists($uri, $routes))
        {
            return new RouteDispatched($routes[$uri]);
        }

        return $this->doDispatch($method, $uri);
    }

    private function doDispatch($method, $uri)
    {
        foreach ($this->routes($method) as $route => $controller){
            $pattern = '#^' . $route . '$#s';

            if (preg_match($pattern, $uri, $parameters)){
                return new RouteDispatched($controller, $parameters);
            }
        }
    }
}