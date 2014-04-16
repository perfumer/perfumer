<?php

namespace App\Controller;

use App\Model\ApiApplicationQuery;
use Perfumer\Controller\JsonController;

class ApiController extends JsonController
{
    protected $api_application;
    protected $user;

    protected function before()
    {
        parent::before();

        $secret_header = 'HTTP_' . $this->container->p('session.api_secret_name');

        if (!isset($_SERVER[$secret_header]))
            $this->proxy->forward('exception/api', 'apiSecretRequired');

        $this->api_application = ApiApplication::create()->findOneByToken($_SERVER[$secret_header]);

        if (!$this->api_application)
            $this->proxy->forward('exception/api', 'apiSecretInvalid');

        $this->user = $this->container->s('auth.api')->getUser();

        $this->view->addVar('user', $this->user, 'app');
    }
}