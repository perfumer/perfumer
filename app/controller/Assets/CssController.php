<?php

namespace App\Controller\Assets;

use Perfumer\Controller\CoreController;

class CssController extends CoreController
{
    public function get()
    {
        $cache = $this->getContainer()->s('cache')->getItem('assets/css/' . $this->getProxy()->i());

        if ($cache->isMiss())
            $this->getProxy()->forward('exception/html', 'pageNotFound');

        $css = $cache->get();

        $combined = '';
        $source_path = $this->getContainer()->p('assets.source_path');

        foreach ($css as $file)
            $combined .= file_get_contents($source_path . $file);

        file_put_contents($this->getContainer()->p('assets.web_path') . '/css/' . $this->getProxy()->i() . '.css', $combined);

        $this->getResponse()->addHeader('Content-type', 'text/css');
        $this->getResponse()->setBody($combined);
    }
}