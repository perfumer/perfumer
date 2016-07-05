<?php

namespace App\Bundle;

use Perfumer\Component\Container\AbstractBundle;

class AppBundle extends AbstractBundle
{
    public function getName()
    {
        return 'app';
    }

    public function getDescription()
    {
        return 'Initial bundle';
    }

    public function getDefinitionFiles()
    {
        return [
            __DIR__ . '/../config/services/shared.php',
            __DIR__ . '/../config/services/' . ENV . '.php',
        ];
    }

    public function getParamFiles()
    {
        return [
            __DIR__ . '/../config/params/shared.php',
            __DIR__ . '/../config/params/' . ENV . '.php',
        ];
    }

    public function getAliases()
    {
        return [
            'router' => 'app.router',
            'request' => 'app.request',
            'view' => 'app.view',
            'template_provider' => 'app.template_provider'
        ];
    }
}
