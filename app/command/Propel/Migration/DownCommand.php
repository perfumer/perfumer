<?php

namespace App\Command\Propel\Migration;

use Perfumer\Console\Command\CoreCommand;

class DownCommand extends CoreCommand
{
    public function action()
    {
        $this->getOutput()->writeln(shell_exec('vendor/bin/propel migration:down --platform=mysql --config-dir=app/config/propel/' . ENV . ' --output-dir=app/config/propel/migration'));
    }
}