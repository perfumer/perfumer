<?php

namespace App\Command\Propel;

use Perfumer\Console\Command\CoreCommand;

class MigrateCommand extends CoreCommand
{
    public function action()
    {
        $this->getOutput()->writeln(shell_exec('vendor/bin/propel migrate --platform=mysql --config-dir=app/config/propel/' . ENV . ' --output-dir=app/config/propel/migration'));
    }
}