<?php

namespace App\Controller;

use Perfumer\Controller\AppController;

class ExceptionController extends AppController
{
    public function http($code)
    {
        $this->addViewVars([
            'code' => $code
        ]);
    }
}