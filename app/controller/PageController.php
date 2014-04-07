<?php

namespace App\Controller;

use Perfumer\Controller\HtmlController;

class PageController extends HtmlController
{
    protected $user;

    protected function before()
    {
        parent::before();
        
        $this->user = $this->container->s('auth')->getUser();

        $this->addAppVars([
            'user' => $this->user
        ]);
    }
}