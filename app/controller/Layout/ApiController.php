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
    protected $user;

    protected function before()
    {
        parent::before();

        if (!method_exists($this, $this->request->getAction()))
            $this->proxy->forward('exception/json', 'pageNotFound');

        $secret_header = 'HTTP_' . $this->container->p('auth.api_secret_name');

        if (!isset($_SERVER[$secret_header]))
            $this->proxy->forward('exception/api', 'apiSecretRequired');

        $this->api_application = ApiApplicationQuery::create()->findOneByToken($_SERVER[$secret_header]);

        if (!$this->api_application)
            $this->proxy->forward('exception/api', 'apiSecretInvalid');

        $this->user = $this->container->s('auth.api')->getUser();

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