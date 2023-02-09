<?php

namespace DemoApp;

use CLIFramework\Exception\CommandArgumentNotEnoughException;
use CLIFramework\Exception\CommandNotFoundException;
use CLIFramework\ServiceContainer;
use CLIFramework\Testing\CommandTestCase;

class MetaCommandTest extends CommandTestCase
{
    public static function setupApplication()
    {
        $service = new ServiceContainer();
        $service['logger']->setQuiet();
        $app = new Application($service);

        return $app;
    }

    public function testMetaArgValidValuesGroups()
    {
        $this->expectOutputRegex("/#groups/");
        $this->runCommand('example/demo meta --zsh commit arg 0 valid-values');
    }

    public function testMetaArgSimpleValidValues()
    {
        $this->expectOutputString(
            "#values
CLIFramework
GetOptionKit
PHPBrew
AssetKit
ActionKit
"
        );
        $this->assertTrue($this->runCommand('example/demo meta --zsh commit arg 1 valid-values'));
    }

    public function testOptValidValues()
    {
        ob_start();
        $this->assertTrue($this->runCommand('example/demo meta --zsh commit opt reuse-message valid-values'));
        $output = ob_get_contents();
        ob_end_clean();
        $lines = explode("\n", trim($output));

        $this->assertEquals('#values', $lines[0]);
        array_shift($lines);
        foreach ($lines as $line) {
            $this->assertRegExp('/^\w{7}$/', $line);
        }
    }

    public function testGenerateZshCompletion()
    {
        $this->expectOutputRegex("!compdef _demo demo!");
        $this->assertTrue($this->runCommand('example/demo zsh --program demo --bind demo'));
    }

    /**
     * @expectedException CLIFramework\Exception\CommandNotFoundException
     */
    public function testCommandNotFound()
    {
        $this->expectException(CommandNotFoundException::class);
        $this->assertTrue($this->runCommand('example/demo --no-interact zzz'));
    }

    /**
     * @expectedException CLIFramework\Exception\CommandArgumentNotEnoughException
     */
    public function testArgument()
    {
        $this->expectException(CommandArgumentNotEnoughException::class);
        $this->assertTrue($this->runCommand('example/demo commit'));
    }
}
