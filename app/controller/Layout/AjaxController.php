<?php

namespace App\Controller\Layout;

use Perfumer\Controller\Helper\ContentHelper;
use Perfumer\Controller\Helper\ErrorsHelper;
use Perfumer\Controller\Helper\MessageHelper;
use Perfumer\Controller\Helper\StatusHelper;
use Perfumer\Controller\TemplateController;

class AjaxController extends TemplateController
{
    use StatusHelper;
    use MessageHelper;
    use ErrorsHelper;
    use ContentHelper;

    protected $user;

    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->request->getAction()))
            $this->proxy->forward('exception/json', 'pageNotFound');

        $this->user = $this->container->s('auth')->getUser();

        $this->view->addVar('user', $this->user, 'app');

        $this->statusBeforeFilter();
        $this->messageBeforeFilter();
        $this->errorsBeforeFilter();
        $this->contentBeforeFilter();
    }

    protected function after()
    {
        $this->errorStatusAfterFilter();
        $this->statusMessageAfterFilter();
        $this->errorsAfterFilter();
        $this->contentAfterFilter();

        $this->view->setTemplateIfNotDefined('layout/json');

        parent::after();
    }
}