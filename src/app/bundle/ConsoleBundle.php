<?php

namespace App\Bundle;

use Perfumer\Component\Container\AbstractBundle;

class ConsoleBundle extends AbstractBundle
{
    public function getName()
    {
        return 'app';
    }

    public function getDescription()
    {
        return 'Initial console bundle';
    }

    public function getDefinitionFiles()
    {
        return [
            __DIR__ . '/../config/services/shared.php',
            __DIR__ . '/../config/services/' . ENV . '.php',
        ];
    }

    public function getResourceFiles()
    {
        return [
            __DIR__ . '/../config/resources/shared.php',
            __DIR__ . '/../config/resources/' . ENV . '.php',
        ];
    }

    public function getAliases()
    {
        return [
            'router' => 'app.console_router',
            'request' => 'app.console_request'
        ];
    }
}
