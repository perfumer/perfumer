<?php

namespace App\Controller\Exception;

use Perfumer\Controller\Helper\MessageHelper;
use Perfumer\Controller\Helper\StatusHelper;
use Perfumer\Controller\TemplateController;

class ApiController extends TemplateController
{
    use StatusHelper;
    use MessageHelper;

    protected function before()
    {
        parent::before();

        $this->statusBeforeFilter();
        $this->messageBeforeFilter();
    }

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
        $this->errorStatusAfterFilter();
        $this->statusMessageAfterFilter();

        $this->view->setTemplateIfNotDefined('layout/json');

        parent::after();
    }
}