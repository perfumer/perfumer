<?php

namespace App\Controller\Layout;

use Perfumer\Controller\CoreController;

class PlainController extends CoreController
{
    protected function before()
    {
        parent::before();

        $this->_user = $this->getContainer()->s('auth')->getUser();
    }
}