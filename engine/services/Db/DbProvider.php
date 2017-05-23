<?php

namespace Engine\Services\Db;

use \Engine\Services\AbstractProvider;
use \Engine\Core\Db\Db;

class DbProvider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'db';

    /**
     * @return mixed
     */
    public function init()
    {
        $db = new Db();
        $this->di->set($this->serviceName, $db);
    }
}