<?php

namespace App\Controller\Exception;

use Perfumer\Controller\Helper\MessageHelper;
use Perfumer\Controller\Helper\StatusHelper;
use Perfumer\Controller\TemplateController;

class JsonController extends TemplateController
{
    use StatusHelper;
    use MessageHelper;

    protected function before()
    {
        parent::before();

        $this->statusBeforeFilter();
        $this->messageBeforeFilter();
    }

    public function pageNotFound()
    {
        $this->setErrorMessage('Page not found.');
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

    protected function after()
    {
        $this->errorStatusAfterFilter();
        $this->statusMessageAfterFilter();

        $this->view->setTemplateIfNotDefined('layout/json');

        parent::after();
    }
}