<?php

namespace App\Controller;

use Perfumer\Controller\JsonController;

class AjaxController extends JsonController
{
    protected function before()
    {
        parent::before();

        $php_cache = $this->container->s('cache.php');

        if (!$php_cache->has('user'))
        {
            $token = $this->container->s('session.cookie_provider')->getToken();

            $this->container->s('session')->start($token);
            $this->container->s('auth')->init();

            $php_cache->set('user', $this->container->s('auth')->getUser());
        }

        $this->user = $php_cache->get('user');

        $this->addAppVars([
            'user' => $this->user
        ]);
    }
}