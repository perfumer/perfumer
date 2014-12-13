<?php

namespace App\Command\Propel;

use Perfumer\Console\Command\CoreCommand;

class DiffCommand extends CoreCommand
{
    public function action()
    {
        $this->getOutput()->writeln(shell_exec('vendor/bin/propel diff --schema-dir=app/config/propel/schema --recursive --config-dir=app/config/propel/dev --output-dir=app/config/propel/migration'));
    }
}