<?php

namespace App\Controller\Assets;

use Perfumer\Controller\CoreController;

class JsController extends CoreController
{
    public function get()
    {
        $cache = $this->getContainer()->s('cache')->getItem('assets/js/' . $this->getProxy()->i());

        if ($cache->isMiss())
            $this->getProxy()->forward('exception/html', 'pageNotFound');

        $js = $cache->get();

        $combined = '';
        $source_path = $this->getContainer()->p('assets.source_path');

        foreach ($js as $file)
            $combined .= file_get_contents($source_path . '/js/' . $file . '.js');

        file_put_contents($this->getContainer()->p('assets.web_path') . '/js/' . $this->getProxy()->i() . '.js', $combined);

        $this->getResponse()->addHeader('Content-type', 'application/javascript');
        $this->getResponse()->setBody($combined);
    }
}