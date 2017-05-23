<?php

namespace Engine\Core\Router;

class UriDispatcher
{
    private $methods = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET'   => '',
        'POST'  => ''
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
        return isset($this->routes[$method]) ? $this->routes($method) : [];
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
    }
}