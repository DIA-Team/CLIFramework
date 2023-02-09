<?php

/*
 * This file is part of the {{ }} package.
 *
 * (c) Yo-An Lin <cornelius.howl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace tests\CLIFramework\Config;

use CLIFramework\Config\GlobalConfig;
use PHPUnit\Framework\TestCase;

class GlobalConfigTest extends TestCase
{
    /**
     * @test
     */
    public function testDefaultValues()
    {
        $config = new GlobalConfig([]);
        $this->assertFalse($config->isVerbose());
        $this->assertFalse($config->isDebug());
    }

    /**
     * @test
     * @dataProvider provideSampleConfig
     */
    public function testIsVerbose($sampleConfig)
    {
        $config = new GlobalConfig($sampleConfig);
        $this->assertTrue($config->isVerbose());
    }

    /**
     * @test
     * @dataProvider provideSampleConfig
     */
    public function testIsDebug($sampleConfig)
    {
        $config = new GlobalConfig($sampleConfig);
        $this->assertTrue($config->isDebug());
    }

    /**
     * @test
     * @dataProvider provideSampleConfig
     */
    public function testGetPidDirectory($sampleConfig)
    {
        $config = new GlobalConfig($sampleConfig);
        $this->assertSame('/var/run', $config->getPidDirectory());
    }

    public function provideSampleConfig()
    {
        return [
          [parse_ini_file(__DIR__ . '/../../data/sample.ini', true)]
        ];
    }
}
