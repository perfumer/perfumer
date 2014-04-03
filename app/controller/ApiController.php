<?php

namespace App\Controller;

use Perfumer\Controller\JsonController;

class ApiController extends JsonController
{
    protected $user;

    protected function before()
    {
        parent::before();
    }
}