<?php

namespace App\Controller\Layout;

use Perfumer\Controller\HtmlController;

class PageController extends HtmlController
{
    protected $user;

    protected function before()
    {
        parent::before();

        $this->user = $this->container->s('auth')->getUser();

        $this->view->addVar('user', $this->user, 'app');
    }
}