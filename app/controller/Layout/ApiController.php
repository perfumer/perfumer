<?php

namespace App\Controller\Layout;

use App\Model\ApiApplicationQuery;
use Perfumer\Controller\Helper\ContentHelper;
use Perfumer\Controller\Helper\ErrorsHelper;
use Perfumer\Controller\Helper\MessageHelper;
use Perfumer\Controller\Helper\StatusHelper;
use Perfumer\Controller\TemplateController;

class ApiController extends TemplateController
{
    use StatusHelper;
    use MessageHelper;
    use ErrorsHelper;
    use ContentHelper;

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