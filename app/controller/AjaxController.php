<?php

namespace App\Controller;

use Perfumer\Controller\JsonController;

class AjaxController extends JsonController
{
    protected function before()
    {
        parent::before();

        if (!$this->stock->has('user'))
        {
            $token = $this->container->s('session.cookie_provider')->getToken();

            $this->container->s('session')->start($token);
            $this->container->s('auth')->init();

            $this->stock->set('user', $this->container->s('auth')->getUser());
        }

        $this->user = $this->stock->get('user');

        $this->addAppVar('user', $this->user);
    }
}