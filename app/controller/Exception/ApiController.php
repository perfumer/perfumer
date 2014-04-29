<?php

namespace App\Controller\Exception;

use Perfumer\Controller\Helper\StatusResponseHelper;
use Perfumer\Controller\TemplateController;

class ApiController extends TemplateController
{
    use StatusResponseHelper;

    public function apiSecretRequired()
    {
        $this->setErrorMessage('You are required to provide application secret key to get access to API.');
    }

    public function apiSecretInvalid()
    {
        $this->setErrorMessage('Invalid application secret key.');
    }

    protected function after()
    {
        $this->prepareStatusResponseViewVars();

        $this->view->setTemplateIfNotDefined('layout/json');

        parent::after();
    }
}