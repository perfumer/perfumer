<?php

namespace App\Controller;

use Perfumer\Controller\CoreController;

class Exception extends CoreController
{
    public function http($code)
    {
        $this->addViewVars([
            'code' => $code
        ]);
    }
}