<?php

namespace tests\CLIFramework;

use CLIFramework\Application;
use CLIFramework\Command;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    private $command;

    public function testHasApplicationWhenApplicationIsNotSet()
    {
        $this->assertFalse($this->command->hasApplication());
    }

    public function testHasApplicationWhenApplicationIsSet()
    {
        $this->command->setApplication(new Application());
        $this->assertTrue($this->command->hasApplication());
    }

    protected function setUp(): void
    {
        $this->command = new CommandTestCommand();
    }
}

class CommandTestCommand extends Command
{
    public function execute()
    {
    }
}
