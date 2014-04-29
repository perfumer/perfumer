<?php

namespace App\Controller\Assets;

use Perfumer\Controller\CoreController;

class CssController extends CoreController
{
    public function get()
    {
        if (!$css = $this->container->s('cache')->get('assets.css.' . $this->proxy->i()))
            $this->proxy->forward('exception/html', 'pageNotFound');

        $css = unserialize($css);

        $combined = '';
        $source_path = $this->container->p('assets.source_path');

        foreach ($css as $file)
            $combined .= file_get_contents($source_path . '/css/' . $file . '.css');

        file_put_contents($this->container->p('assets.web_path') . '/css/' . $this->proxy->i() . '.css', $combined);

        $this->response->addHeader('Content-type', 'text/css');
        $this->response->setBody($combined);
    }
}