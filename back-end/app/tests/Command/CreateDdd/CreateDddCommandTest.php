<?php

namespace App\Tests\Command\CreateDdd;

use Symfony\Component\Console\Tester\CommandTester;
use App\Tests\AbstractKernelTestCase;

/**
 * @covers App\Command\Ddd\CreateDdd\CreateDddCommand
 */
class CreateDddCommandTest extends AbstractKernelTestCase
{
    
    /**
     * 
     * @var string $expected Expected Success Response from the Command
     */
    private string $expected = '[OK] You have a new domain ManonDomain';
    
    /**
     * @covers App\Command\Ddd\CreateDdd\CreateDddCommand::execute
     */
    public function testExecute()
    {
        $command = $this->application->find('app:create:ddd');

        $commandTester = new CommandTester( $command );
        $commandTester->execute(['name' => 'ManonDomainTest1']);
        $commandTester->setInputs(['yes', 'yes', 'yes', 'yes', 'yes']);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString($this->expected, $output);
    }
}
