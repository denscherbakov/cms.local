<?php
/**
 * Created by PhpStorm.
 * User: Papka
 * Date: 06.07.2017
 * Time: 23:23
 */

namespace Cms\Controller;

class ErrorController extends CmsController
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function page404()
    {
        echo 'Error';
    }
}