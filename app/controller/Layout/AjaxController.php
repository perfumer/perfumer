<?php

namespace App\Controller\Layout;

use Perfumer\Controller\JsonController;

class AjaxController extends JsonController
{
    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->getCurrent()->getAction()))
            $this->getProxy()->forward('exception/json', 'pageNotFound');

        $this->_user = $this->getContainer()->s('auth')->getUser();
    }
}