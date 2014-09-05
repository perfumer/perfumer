<?php

namespace App\Controller\Exception;

use Perfumer\Controller\JsonController;

class ApiController extends JsonController
{
    public function apiSecretRequired()
    {
        $this->setErrorMessage('You are required to provide application secret key to get access to API.');
    }

    public function apiSecretInvalid()
    {
        $this->setErrorMessage('Invalid application secret key.');
    }
}