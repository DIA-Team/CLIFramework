<?php

namespace DemoApp\Command;

use CLIFramework\Command;

class FooCommand extends Command
{
    public function brief()
    {
        return 'brief of foo';
    }

    public function init()
    {
        $this->command('subfoo', 'DemoApp\\Command\\FooCommand\\SubFooCommand');
    }

    public function execute()
    {
        $this->getLogger()->info('executing foo command.');
    }
}
