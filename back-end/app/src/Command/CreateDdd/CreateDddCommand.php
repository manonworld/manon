<?php

declare( strict_types = 1 );

namespace App\Command\CreateDdd;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\QuestionHelper;
use App\Command\CreateDdd\Bus\Question\AskForBusQuest;
use App\Command\CreateDdd\Bus\Service\CreateBus;
use App\Command\CreateDdd\Entity\Question\AskForEntQuest;
use App\Command\CreateDdd\Entity\Service\CreateEntity;
use App\Command\CreateDdd\Controller\Service\CreateController;
use App\Command\CreateDdd\Controller\Question\AskForConQuest;
use App\Command\CreateDdd\CreateDDDConsts;
use App\Command\AbstractCommand;

/**
 * 
 * Creates the whole DDD directory structure
 * 
 * @property string $defaultName
 * @property CreateBus $createBus
 * @property CreateEntity $createEntity
 * @property CreateController $createController
 * 
 * @method void configure()
 * @method int execute( InputInterface $input, OutputInterface $output )
 * @method void createDomain( InputeInterface $input, OutputInterface $output )
 * @method array getQuestsWithHandlers( InputInterface $input, OutputInterface $output )
 * @method bool ask( InputInterface $input, OutputInterface $output, $question, $helper )
 * 
 */
class CreateDddCommand extends AbstractCommand
{
    /**
     * @property string $defaultName
     */
    protected static $defaultName = 'app:create:ddd';

    /**
     * @property CreateBus $createBus
     */
    private CreateBus $createBus;

    /**
     * @property CreateEntity $createEntity
     */
    private CreateEntity $createEntity;

    /**
     * @property CreateController $createController
     */
    private CreateController $createController;

    /**
     * 
     * New Instance
     * 
     * @param CreateBus $createBus
     * @param CreateEntity $createEntity
     * @param CreateController $createController
     * 
     */
    public function __construct( 
        CreateBus $createBus,
        CreateEntity $createEntity,
        CreateController $createController
    ) {
        parent::__construct();
        $this->createBus        = $createBus;
        $this->createEntity     = $createEntity;
        $this->createController = $createController;
    }

    /**
     * Command Configuration options
     * 
     * @return void
     */
    protected function configure()
    {
        $this->setDescription( CreateDDDConsts::DESC() )
            ->addArgument(
                'name', 
                InputArgument::REQUIRED, 
                CreateDDDConsts::NAME_DESC()
            );
    }

    /**
     * Creates a new DDD Directory structure
     * 
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute( InputInterface $input, OutputInterface $output ): int
    {
        $io = new SymfonyStyle( $input, $output );

        $name = $input->getArgument( 'name' );

        if ( $name ) {
            $io->note( sprintf( CreateDDDConsts::INFO() , $name ) );
        }

        $this->createDomain( $input , $output, $name );

        $io->success( sprintf( CreateDDDConsts::SUCC() , $name ) );

        return 0;
    }


    /**
     * Performs the domain creation process
     * 
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     * @return void
     */
    private function createDomain(
        InputInterface $input,
        OutputInterface $output,
        string $name
    ): void {
        $helper = $this->getHelper('question');
        $quests = $this->getQuestsWithHandlers( $input, $output );
        foreach ( $quests as $quest ) {
            if ( $this->ask( $input, $output, $quest['question'], $helper ) ) {
                $quest['handler']->execute( __DIR__ , $name );
            }
        }
    }


    /**
     * Gets the gestions with its approperiate handlers
     * 
     * @return array
     */
    private function getQuestsWithHandlers(
        InputInterface $input, 
        OutputInterface $output 
    ): array {
        return [
            ['question' => AskForBusQuest::ask( $input, $output ), 'handler' => $this->createBus], 
            ['question' => AskForEntQuest::ask( $input, $output ), 'handler' => $this->createEntity],
            ['question' => AskForConQuest::ask( $input, $output ), 'handler' => $this->createController],
        ];
    }



    /**
     * Creates a bus if user accepts
     * 
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param mixed $quest
     * @param mixed $helper
     * 
     * @return bool
     */
    private function ask( InputInterface $input, OutputInterface $output, $question, $helper ): bool
    {
        return $helper->ask( $input, $output, $question );
    }
}
