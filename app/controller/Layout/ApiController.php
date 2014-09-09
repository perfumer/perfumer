<?php

namespace App\Controller\Layout;

use App\Model\ApiApplicationQuery;
use Perfumer\Controller\JsonController;

class ApiController extends JsonController
{
    protected $_auth_service_name = 'auth.api';

    protected $api_application;

    protected function before()
    {
        parent::before();

        $secret_header = 'HTTP_' . $this->getContainer()->getParam('auth.api_secret_name');

        if (!isset($_SERVER[$secret_header]))
            $this->getProxy()->forward('exception/api', 'apiSecretRequired');

        $this->api_application = ApiApplicationQuery::create()->findOneByToken($_SERVER[$secret_header]);

        if (!$this->api_application)
            $this->getProxy()->forward('exception/api', 'apiSecretInvalid');
    }
}