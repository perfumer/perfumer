<?php

namespace App\Controller\Layout;

use Perfumer\MVC\Controller\TemplateController;

class PageController extends TemplateController
{
    protected function before()
    {
        parent::before();

        $this->getView()->mapGroup('vars', 'app');
    }
}