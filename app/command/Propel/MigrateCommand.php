<?php

namespace App\Command\Propel;

use Perfumer\Console\Command\CoreCommand;

class MigrateCommand extends CoreCommand
{
    public function action()
    {
        $this->getOutput()->writeln(shell_exec('vendor/bin/propel migrate --input-dir=app/config/propel --output-dir=app/config/propel/migration'));
    }
}