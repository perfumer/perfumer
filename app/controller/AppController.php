<?php

namespace App\Controller;

use Perfumer\Controller\AppController as BaseController;

class AppController extends BaseController
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

        $this->user = $this->global_vars['user'] = $this->stock->get('user');
    }
}