<?php

namespace App\Controller\Assets;

use Perfumer\Controller\CoreController;

class JsController extends CoreController
{
    public function get()
    {
        if (!$js = $this->container->s('cache')->get('assets.js.' . $this->proxy->i()))
            $this->proxy->forward('exception/html', 'pageNotFound');

        $js = unserialize($js);

        $combined = '';
        $source_path = $this->container->p('assets.source_path');

        foreach ($js as $file)
            $combined .= file_get_contents($source_path . '/js/' . $file . '.js');

        file_put_contents($this->container->p('assets.web_path') . '/js/' . $this->proxy->i() . '.js', $combined);

        $this->response->addHeader('Content-type', 'application/javascript');
        $this->response->setBody($combined);
    }
}