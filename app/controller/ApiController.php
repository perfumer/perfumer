<?php

namespace App\Controller;

use App\Model\ApiSecretQuery;
use Perfumer\Controller\JsonController;

class ApiController extends JsonController
{
    protected $application;
    protected $user;

    protected function before()
    {
        parent::before();

        $secret_header = 'HTTP_' . $this->container->p('session.api_secret_name');

        if (!isset($_SERVER[$secret_header]))
            $this->proxy->forward('exception/api', 'apiSecretRequired');

        $this->application = ApiSecretQuery::create()->findOneByToken($_SERVER[$secret_header]);

        if (!$this->application)
            $this->proxy->forward('exception/api', 'apiSecretInvalid');

        $this->user = $this->container->s('auth.api')->getUser();

        $this->view->addVar('user', $this->user, 'app');
    }
}