<?php

namespace App\Controller\Exception;

use Perfumer\Controller\JsonController as BaseController;

class JsonController extends BaseController
{
    public function pageNotFound()
    {
        $this->setErrorMessage('Page not found.');
    }

    public function actionNotFound()
    {
        $this->setErrorMessage('Action not found.');
    }

    public function isLogged()
    {
        $this->setErrorMessage('Access to this page is permitted to logged in users only.');
    }

    public function isAdmin()
    {
        $this->setErrorMessage('Access to this page is permitted to administrators only.');
    }

    public function isGranted()
    {
        $this->setErrorMessage('You do not have enough rights to access this page.');
    }
}