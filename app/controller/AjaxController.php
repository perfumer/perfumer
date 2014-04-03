<?php

namespace App\Controller;

use Perfumer\Controller\JsonController;

class AjaxController extends JsonController
{
    protected $user;

    protected function before()
    {
        parent::before();

        $token = $this->container->s('session.cookie_provider')->getToken();
        $this->container->s('session')->start($token);
        $this->user = $this->container->s('auth')->getUser();

        $this->addAppVars([
            'user' => $this->user
        ]);
    }
}