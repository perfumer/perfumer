<?php

namespace App\Controller\Layout;

use App\Model\ApiApplicationQuery;
use Perfumer\Controller\JsonController;

class ApiController extends JsonController
{
    protected $api_application;

    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->getCurrent()->getAction()))
            $this->getProxy()->forward('exception/json', 'pageNotFound');

        $secret_header = 'HTTP_' . $this->getContainer()->p('auth.api_secret_name');

        if (!isset($_SERVER[$secret_header]))
            $this->getProxy()->forward('exception/api', 'apiSecretRequired');

        $this->api_application = ApiApplicationQuery::create()->findOneByToken($_SERVER[$secret_header]);

        if (!$this->api_application)
            $this->getProxy()->forward('exception/api', 'apiSecretInvalid');

        $this->_user = $this->getContainer()->s('auth.api')->getUser();
    }
}