<?php

namespace App\Command\Propel;

use Perfumer\Console\Command\CoreCommand;

class DiffCommand extends CoreCommand
{
    public function action()
    {
        $this->getOutput()->writeln(shell_exec('vendor/bin/propel diff --input-dir=app/config/propel --output-dir=app/config/propel/migration'));
    }
}