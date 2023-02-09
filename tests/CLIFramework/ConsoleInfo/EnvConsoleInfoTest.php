<?php

use CLIFramework\ConsoleInfo\EnvConsoleInfo;
use PHPUnit\Framework\TestCase;

class EnvConsoleInfoTest extends TestCase
{
    public function test()
    {
        if (!EnvConsoleInfo::hasSupport()) {
            return $this->markTestSkipped('env console info is not supported.');
        }
        $info = new EnvConsoleInfo();
        $this->assertNotNull($info->getColumns());
        $this->assertNotNull($info->getRows());
    }
}
