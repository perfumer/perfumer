<?php

namespace App\Controller\Exception;

use Perfumer\MVC\Controller\SerializeController;

class ApiController extends SerializeController
{
    public function apiSecretRequired()
    {
        $this->getResponse()->setStatusCode(403);

        $this->setErrorMessage('You are required to provide application secret key to get access to API.');
    }

    public function apiSecretInvalid()
    {
        $this->getResponse()->setStatusCode(403);

        $this->setErrorMessage('Invalid application secret key.');
    }
}