<?php

declare( strict_types = 1 );

namespace App\Command\Ddd\CreateDdd;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Command\Ddd\CreateDdd\Bus\Service\CreateBus;
use App\Command\Ddd\CreateDdd\Bus\Question\AskForBusQuest;
use App\Command\Ddd\CreateDdd\Entity\Question\AskForEntQuest;
use App\Command\Ddd\CreateDdd\Entity\Service\CreateEntity;
use App\Command\Ddd\CreateDdd\Controller\Service\CreateController;
use App\Command\Ddd\CreateDdd\Controller\Question\AskForConQuest;
use App\Command\Ddd\CreateDdd\Service\Question\AskForSvcQuest;
use App\Command\Ddd\CreateDdd\Service\Service\CreateService;
use App\Command\Ddd\CreateDdd\Repo\Service\CreateRepo;
use App\Command\Ddd\CreateDdd\Repo\Question\AskForRepoQuest;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;
use App\Command\Ddd\ValueObject\DirName;
use App\Command\AbstractCommand;

/**
 *
 * Creates the whole DDD directory structure
 *
 * @property string $defaultName
 * @property CreateBus $createBus
 * @property CreateEntity $createEntity
 * @property CreateController $createController
 * @property CreateService $createService
 * @property CreateRepo $createRepo
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
     * @property CreateService $createService
     */
    private CreateService $createService;

    /**
     * @property CreateRepo $createRepo
     */
    private CreateRepo $createRepo;
    
    /**
     * @property ValidatorInterface
     */
    private ValidatorInterface $validator;
    
    /**
     *
     * @property DirName $dirName
     */
    private DirName $dirName;

    /**
     *
     * New Instance
     *
     * @param CreateBus $createBus
     * @param CreateEntity $createEntity
     * @param CreateController $createController
     * @param CreateService $createService
     * @param CreateRepo $createRepo
     *
     */
    public function __construct(
        CreateBus $createBus,
        CreateEntity $createEntity,
        CreateController $createController,
        CreateService $createService,
        CreateRepo $createRepo,
        ValidatorInterface $validator,
        DirName $dirName
    ) {
        parent::__construct();
        $this->createBus        = $createBus;
        $this->createEntity     = $createEntity;
        $this->createController = $createController;
        $this->createService    = $createService;
        $this->createRepo       = $createRepo;
        $this->validator        = $validator;
        $this->dirName          = $dirName;
    }

    /**
     * Command Configuration options
     *
     * @return void
     */
    protected function configure()
    {
        $this->setDescription(CreateDDDConsts::DESC())
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
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');
        if (!$this->validate($name)) {
            $io->error(CreateDDDConsts::NAME_ERR());
            return 1;
        } else {
            $io->note(sprintf(CreateDDDConsts::INFO(), $name));
            try {
                $this->createDomain($input, $output, $name);
            } catch (\Exception $e) {
                $io->error($e->getMessage());
                return 1;
            }
            $io->success(sprintf(CreateDDDConsts::SUCC(), $name));
            return 0;
        }
    }
    
    /**
     *
     * Validates the name of the DDD directory
     * entered by the user
     *
     * @param string $name
     * @return bool
     */
    private function validate(string $name): bool
    {
        $errors = $this->validator
            ->validate(
                $this->dirName->setName($name)
            );
        
        if (count($errors)) {
            return false;
        }
        
        return true;
    }


    /**
     * Performs the domain creation process
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param string $name
     *
     * @return void
     */
    private function createDomain(
        InputInterface $input,
        OutputInterface $output,
        string $name
    ): void {
        $helper = $this->getHelper('question');
        $quests = $this->getQuestsWithHandlers($input, $output);
        foreach ($quests as $quest) {
            if ($this->ask($input, $output, $quest['question'], $helper)) {
                $quest['handler']->execute(__DIR__, $name);
            }
        }
    }


    /**
     * Gets the questions with its appropriate handlers
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return array
     */
    private function getQuestsWithHandlers(
        InputInterface $input,
        OutputInterface $output
    ): array {
        return [
            ['question' => AskForBusQuest::ask($input, $output) , 'handler' => $this->createBus],
            ['question' => AskForEntQuest::ask($input, $output) , 'handler' => $this->createEntity],
            ['question' => AskForConQuest::ask($input, $output) , 'handler' => $this->createController],
            ['question' => AskForSvcQuest::ask($input, $output) , 'handler' => $this->createService],
            ['question' => AskForRepoQuest::ask($input, $output), 'handler' => $this->createRepo],
        ];
    }



    /**
     * Asks for confirmation from the user regarding the creation process
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param mixed $question
     * @param mixed $helper
     *
     * @return bool
     */
    private function ask(InputInterface $input, OutputInterface $output, $question, $helper): bool
    {
        return $helper->ask($input, $output, $question);
    }
}
