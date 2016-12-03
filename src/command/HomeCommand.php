<?php

namespace App\Command;

use Perfumer\Framework\Controller\PlainController;

class HomeCommand extends PlainController
{
    public function action()
    {
        $this->getResponse()->setContent('Hello, world!');
    }
}