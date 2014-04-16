<?php

namespace App\Controller;

use Perfumer\Controller\CoreController;

class PlainController extends CoreController
{
    protected $user;

    protected function before()
    {
        parent::before();

        $this->user = $this->container->s('auth')->getUser();

        $this->view->addVar('user', $this->user, 'app');
    }
}