<?php

namespace App\Controller\Exception;

use Perfumer\MVC\Controller\SerializeController;

class JsonController extends SerializeController
{
    public function pageNotFound()
    {
        $this->getResponse()->setStatusCode(404);

        $this->setErrorMessage('Page not found.');
    }

    public function actionNotFound()
    {
        $this->getResponse()->setStatusCode(405);

        $this->setErrorMessage('Action not found.');
    }

    public function isLogged()
    {
        $this->getResponse()->setStatusCode(403);

        $this->setErrorMessage('Access to this page is permitted to logged in users only.');
    }

    public function isAdmin()
    {
        $this->getResponse()->setStatusCode(403);

        $this->setErrorMessage('Access to this page is permitted to administrators only.');
    }

    public function isGranted()
    {
        $this->getResponse()->setStatusCode(403);

        $this->setErrorMessage('You do not have enough rights to access this page.');
    }
}