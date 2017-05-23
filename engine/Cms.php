<?php

namespace Engine;
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
        $this->router->add('Home', '/', 'HomeController@index');
        var_dump($this->di);
    }
}