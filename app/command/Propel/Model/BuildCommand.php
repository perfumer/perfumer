<?php

namespace App\Command\Propel\Model;

use Perfumer\Console\Command\CoreCommand;

class BuildCommand extends CoreCommand
{
    public function action()
    {
        $this->getOutput()->writeln(shell_exec('vendor/bin/propel model:build --input-dir=app/config/propel/dev --output-dir=app/model'));
    }
}