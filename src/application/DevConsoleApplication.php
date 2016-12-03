<?php

namespace App\Application;

use App\Bundle\ConsoleBundle as AppConsoleBundle;
use Perfumer\Framework\Application\AbstractApplication;
use Perfumer\Package\Framework\Bundle\ConsoleBundle;

class DevConsoleApplication extends AbstractApplication
{
    public function getBundles()
    {
        return [
            new ConsoleBundle(),
            new AppConsoleBundle(),
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