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
namespace TestApp;

class Application extends \CLIFramework\Application 
{

    public function options($getopt)
    {
        $getopt->add('c|color','Color message');
        parent::options($getopt);
    }

    public function init()
    {
        parent::init();
        $this->addCommand('list');
        $this->addCommand('test1');

        $this->addGroup('Daily Basic', ['list', 'test1']);
    }



}
