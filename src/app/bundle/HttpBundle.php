<?php

namespace App\Bundle;

class HttpBundle extends BaseBundle
{
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
