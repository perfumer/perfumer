<?php

namespace App\Controller\Layout;

use Perfumer\Controller\CoreController;

class PlainController extends CoreController
{
    protected $user;

    protected function before()
    {
        parent::before();

        $this->user = $this->container->s('auth')->getUser();
    }
}