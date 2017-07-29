<?php

namespace Engine\Service;

abstract class AbstractProvider
{
    /**
     * @var \Engine\DI
     */
    protected $di;

    public function __construct(\Engine\DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();
}