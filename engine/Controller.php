<?php

namespace Engine;

use Engine\DI;


abstract class Controller
{
    /**
     * @var DI
     */
    protected $di;

    protected $db;

    public function __construct(DI $di)
    {
        $this->di = $di;
    }
}