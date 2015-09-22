<?php

namespace App\Controller\Layout;

use App\Model\ApplicationQuery;
use Perfumer\MVC\Controller\SerializeController;

class ApiController extends SerializeController
{
    protected $_auth_service_name = 'auth.api';

    protected $_application;

    protected function before()
    {
        parent::before();

        $secret_header = 'HTTP_' . $this->getContainer()->getParam('auth.api_secret_name');

        if (!isset($_SERVER[$secret_header]))
            $this->getProxy()->forward('exception/api', 'apiSecretRequired');

        $this->_application = ApplicationQuery::create()->findOneByToken($_SERVER[$secret_header]);

        if (!$this->_application)
            $this->getProxy()->forward('exception/api', 'apiSecretInvalid');
    }
}