<?php

namespace App\Controller\Filter;

use App\Controller\Layout\PlainController;

class PermissionController extends PlainController
{
    public function isLogged($mode)
    {
        if (!$this->user->isLogged())
            $this->proxy->forward('exception/' . $mode, 'isLogged');
    }

    public function isAdmin($mode)
    {
        $this->isLogged($mode);

        if (!$this->user->isAdmin())
            $this->proxy->forward('exception/' . $mode, 'isAdmin');
    }

    public function isGranted($permissions, $mode)
    {
        $this->isLogged($mode);

        if (!$this->user->isGranted($permissions))
            $this->proxy->forward('exception/' . $mode, 'isGranted');
    }
}