<?php

namespace App\Tests\Command\CreateDdd;

use Symfony\Component\Console\Tester\CommandTester;
use App\Tests\AbstractKernelTestCase;

/**
 * @covers \App\Command\CreateDdd\CreateDddCommand
 */
class CreateDddCommandTest extends AbstractKernelTestCase
{
    
    /**
     * @covers \App\Command\CreateDdd\CreateDddCommand::execute
     */
    public function testExecute()
    {
        $command = $this->application->find('app:create:ddd');

        $commandTester = new CommandTester( $command );
        $commandTester->execute(['name' => 'ManonDomain']);
        $commandTester->setInputs(['yes', 'yes', 'yes', 'yes', 'yes']);

        $output = $commandTester->getDisplay();
        $expected = '[OK] You have a new domain ManonDomain';
        $this->assertStringContainsString($expected, $output);
    }
}
