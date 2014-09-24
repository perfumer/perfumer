<?php

namespace App\Controller\Exception;

use App\Controller\Layout\PageController as BaseController;

class PageController extends BaseController
{
    public function pageNotFound()
    {
        $this->getResponse()->setStatusCode(404);
    }

    public function controllerNotFound()
    {
        $this->getResponse()->setStatusCode(404);
    }

    public function actionNotFound()
    {
        $this->getResponse()->setStatusCode(405);
    }

    public function isLogged()
    {
        $this->getResponse()->setStatusCode(403);
    }

    public function isAdmin()
    {
        $this->getResponse()->setStatusCode(403);
    }

    public function isGranted()
    {
        $this->getResponse()->setStatusCode(403);
    }

    public function redirect($url, $status_code)
    {
        $this->getResponse()->setStatusCode($status_code)->headers->set('Location', '/' . ltrim($url, '/'));
    }
}