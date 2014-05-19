<?php

namespace App\Controller\Layout;

use Perfumer\Controller\CoreController;

class PlainController extends CoreController
{
    protected $user;

    protected function before()
    {
        parent::before();

        $this->user = $this->getContainer()->s('auth')->getUser();
    }
}