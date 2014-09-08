<?php

namespace App\Controller\Layout;

use Perfumer\Controller\TemplateController;

class PageController extends TemplateController
{
    protected function before()
    {
        parent::before();

        $this->getView()->mapGroup('js', 'app');
    }
}