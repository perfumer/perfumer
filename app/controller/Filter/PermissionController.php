<?php

namespace App\Controller\Filter;

use App\Controller\Layout\PlainController;

class PermissionController extends PlainController
{
    public function isLogged($mode)
    {
        if (!$this->getUser()->isLogged())
            $this->getProxy()->forward('exception/' . $mode, 'isLogged');
    }

    public function isAdmin($mode)
    {
        $this->isLogged($mode);

        if (!$this->getUser()->isAdmin())
            $this->getProxy()->forward('exception/' . $mode, 'isAdmin');
    }

    public function isGranted($permissions, $mode)
    {
        $this->isLogged($mode);

        if (!$this->getUser()->isGranted($permissions))
            $this->getProxy()->forward('exception/' . $mode, 'isGranted');
    }
}