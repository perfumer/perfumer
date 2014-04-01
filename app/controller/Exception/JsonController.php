<?php

namespace App\Controller\Exception;

use Perfumer\Controller\JsonController as BaseController;

class JsonController extends BaseController
{
    public function pageNotFound()
    {
        $this->error_message = 'Page not found.';
    }

    public function isLogged()
    {
        $this->error_message = 'Access to this page is permitted to logged in users only.';
    }

    public function isAdmin()
    {
        $this->error_message = 'Access to this page is permitted to administrators only.';
    }

    public function isGranted()
    {
        $this->error_message = 'You do not have enough rights to access this page.';
    }
}