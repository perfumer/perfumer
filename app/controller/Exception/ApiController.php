<?php

namespace App\Controller\Exception;

use Perfumer\Controller\JsonController as BaseController;

class ApiController extends BaseController
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