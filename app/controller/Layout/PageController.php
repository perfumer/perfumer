<?php

namespace App\Controller\Layout;

use Perfumer\Controller\TemplateController;

class PageController extends TemplateController
{
    protected $user;

    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->getCurrent()->getAction()))
            $this->getProxy()->forward('exception/html', 'pageNotFound');

        $this->getView()->mapGroup('js', 'app');

        $this->user = $this->getContainer()->s('auth')->getUser();

        $this->getView()->addVar('user', $this->user, 'app');
    }
}