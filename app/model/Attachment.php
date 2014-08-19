<?php

namespace App\Model;

use App\Model\Base\Attachment as BaseAttachment;
use Propel\Runtime\Connection\ConnectionInterface;

class Attachment extends BaseAttachment
{
    public function postDelete(ConnectionInterface $con = null)
    {
        @unlink(ATTACHMENTS_DIR . $this->getPath());
    }
}