<?php

namespace App\Controller\Assets;

use Perfumer\Controller\CoreController;

class CssController extends CoreController
{
    public function get()
    {
        if (!$css = $this->getContainer()->s('cache')->get('assets.css.' . $this->getProxy()->i()))
            $this->getProxy()->forward('exception/html', 'pageNotFound');

        $css = unserialize($css);

        $combined = '';
        $source_path = $this->getContainer()->p('assets.source_path');

        foreach ($css as $file)
            $combined .= file_get_contents($source_path . '/css/' . $file . '.css');

        file_put_contents($this->getContainer()->p('assets.web_path') . '/css/' . $this->getProxy()->i() . '.css', $combined);

        $this->getResponse()->addHeader('Content-type', 'text/css');
        $this->getResponse()->setBody($combined);
    }
}