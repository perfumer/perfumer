<?php

namespace App\Controller\Layout;

use Perfumer\Controller\Helper\StatusResponseHelper;
use Perfumer\Controller\TemplateController;

class AjaxController extends TemplateController
{
    use StatusResponseHelper;

    protected $user;

    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->request->getAction()))
            $this->proxy->forward('exception/json', 'pageNotFound');

        $this->user = $this->container->s('auth')->getUser();

        $this->view->addVar('user', $this->user, 'app');
    }

    protected function after()
    {
        $this->prepareStatusResponseViewVars();

        $this->view->setTemplateIfNotDefined('layout/json');

        parent::after();
    }
}