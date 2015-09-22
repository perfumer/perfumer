<?php

namespace App\Controller\Filter\Permission;

use Perfumer\MVC\Controller\CoreController;

class PageController extends CoreController
{
    public function isLogged()
    {
        if (!$this->getUser()->isLogged())
            $this->getProxy()->forward('exception/page', 'isLogged');
    }

    public function isAdmin()
    {
        $this->isLogged();

        if (!$this->getUser()->isAdmin())
            $this->getProxy()->forward('exception/page', 'isAdmin');
    }

    public function isGranted($permissions)
    {
        $this->isLogged();

        if (!$this->getUser()->isGranted($permissions))
            $this->getProxy()->forward('exception/page', 'isGranted');
    }
}