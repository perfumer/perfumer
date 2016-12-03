<?php

namespace App\Application;

use App\Bundle\HttpBundle as AppHttpBundle;
use Perfumer\Framework\Application\AbstractApplication;
use Perfumer\Package\Framework\Bundle\HttpBundle;

class DevHttpApplication extends AbstractApplication
{
    public function getBundles()
    {
        return [
            new HttpBundle(),
            new AppHttpBundle(),
        ];
    }

    protected function before()
    {
        parent::before();

        define('ENV', 'dev');
        define('ROOT_DIR', __DIR__ . '/../../');
        define('TMP_DIR', ROOT_DIR . 'tmp/');
        define('VENDOR_DIR', ROOT_DIR . 'vendor/');
    }
}