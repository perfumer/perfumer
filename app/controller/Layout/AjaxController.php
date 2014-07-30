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

    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->getCurrent()->getAction()))
            $this->getProxy()->forward('exception/json', 'pageNotFound');

        $this->_user = $this->getContainer()->s('auth')->getUser();

        $this->getView()->addVar('user', $this->getUser(), 'app');

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

        $this->getView()->setTemplateIfNotDefined('layout/json');

        parent::after();
    }
}