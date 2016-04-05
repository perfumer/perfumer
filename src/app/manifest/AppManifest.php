<?php

namespace App\Manifest;

use Perfumer\Framework\Bundle\AbstractManifest;

class AppManifest extends AbstractManifest
{
    public function getName()
    {
        return 'app';
    }

    public function getDescription()
    {
        return '';
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
            'external_router' => 'app.external_router',
            'request' => 'app.request',
            'view' => 'app.view',
            'template_provider' => 'app.view.template_provider'
        ];
    }
}
