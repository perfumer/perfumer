<?php

namespace App\Command;

use Perfumer\Console\Command\CoreCommand;

class ExceptionCommand extends CoreCommand
{
    public function commandNotFound()
    {
        $this->getOutput()->writeln('Command not found');
    }
}