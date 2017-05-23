<?php

require __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI;

try {
    $di = new DI();

    $services = require __DIR__ . '/configs/Service.php';

    foreach ($services as $service){
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new Cms($di);
    $cms->run();
} catch (\ErrorException $e){
    echo $e->getMessage();
}