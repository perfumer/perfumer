<?php

namespace App\Bundle;

use Perfumer\Component\Container\AbstractBundle;

class HttpBundle extends AbstractBundle
{
    public function getName()
    {
        return 'app';
    }

    public function getDescription()
    {
        return 'Initial http bundle';
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
            'router' => 'app.http_router',
            'request' => 'app.http_request',
            'view' => 'app.view',
            'template_provider' => 'app.template_provider'
        ];
    }
}
