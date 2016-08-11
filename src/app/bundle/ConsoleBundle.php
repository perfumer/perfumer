<?php

namespace App\Bundle;

class ConsoleBundle extends BaseBundle
{
    public function getAliases()
    {
        return [
            'router' => 'app.console_router',
            'request' => 'app.console_request'
        ];
    }
}
