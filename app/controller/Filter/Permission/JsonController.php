<?php

namespace App\Controller\Filter\Permission;

use Perfumer\MVC\Controller\CoreController;

class JsonController extends CoreController
{
    public function isLogged()
    {
        if (!$this->getUser()->isLogged())
            $this->getProxy()->forward('exception/json', 'isLogged');
    }

    public function isAdmin()
    {
        $this->isLogged();

        if (!$this->getUser()->isAdmin())
            $this->getProxy()->forward('exception/json', 'isAdmin');
    }

    public function isGranted($permissions)
    {
        $this->isLogged();

        if (!$this->getUser()->isGranted($permissions))
            $this->getProxy()->forward('exception/json', 'isGranted');
    }
}