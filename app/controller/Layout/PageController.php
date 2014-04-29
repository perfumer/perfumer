<?php

namespace App\Controller\Layout;

use Perfumer\Controller\TemplateController;

class PageController extends TemplateController
{
    protected $user;

    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->request->getAction()))
            $this->proxy->forward('exception/html', 'pageNotFound');

        $this->view->mapGroup('js', 'app');

        $this->user = $this->container->s('auth')->getUser();

        $this->view->addVar('user', $this->user, 'app');
    }
}