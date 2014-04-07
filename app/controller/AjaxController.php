<?php

namespace App\Controller;

use Perfumer\Controller\JsonController;

class AjaxController extends JsonController
{
    protected $user;

    protected function before()
    {
        parent::before();

        $this->user = $this->container->s('auth')->getUser();

        $this->addAppVars([
            'user' => $this->user
        ]);
    }
}