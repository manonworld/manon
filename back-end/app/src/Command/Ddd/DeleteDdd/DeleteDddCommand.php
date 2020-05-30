<?php

declare( strict_types = 1 );

namespace App\Command\Ddd\DeleteDdd;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Command\Ddd\DeleteDdd\Question\AskForDelQuest;
use App\Command\Ddd\DeleteDdd\Service\DeleteDomain;
use App\Command\Ddd\DeleteDdd\DeleteDDDConsts;
use App\Command\Ddd\ValueObject\DirName;
use App\Command\AbstractCommand;
use App\Command\Ddd\DeleteDdd\UserCancelException;

/**
 *
 * Deletes a whole DDD directory structure
 *
 * @property string $defaultName
 * @property DirName $dirName
 * @property ValidatorInterface $validator
 *
 *
 * @method void configure()
 * @method int execute( InputInterface $input, OutputInterface $output )
 * @method void deleteDomain( InputeInterface $input, OutputInterface $output )
 * @method array getQuestsWithHandlers( string $name )
 * @method bool ask( InputInterface $input, OutputInterface $output, $question, $helper )
 *
 */
class DeleteDddCommand extends AbstractCommand
{
    /**
     * @property string $defaultName
     */
    protected static $defaultName = 'app:delete:ddd';
    
    /**
     *
     * @property DirName $dirName
     */
    private DirName $dirName;
    
    /**
     * @property ValidatorInterface
     */
    private ValidatorInterface $validator;
    
    /**
     * @property DeleteDomain $delDom
     */
    private DeleteDomain $delDom;

    /**
     *
     * New Instance
     *
     * @param DirName $dirName
     * @param ValidatorInterface $validator
     * @param DeleteDomain $delDom
     *
     */
    public function __construct(
        ValidatorInterface $validator,
        DirName $dirName,
        DeleteDomain $delDom
    ) {
        parent::__construct();
        $this->validator        = $validator;
        $this->dirName          = $dirName;
        $this->delDom           = $delDom;
    }

    /**
     * Command Configuration options
     *
     * @return void
     */
    protected function configure()
    {
        $this->setDescription(DeleteDDDConsts::DESC())
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                DeleteDDDConsts::NAME_DESC()
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
            $io->error(DeleteDDDConsts::NAME_ERR());
            return 1;
        } else {
            $io->note(sprintf(DeleteDDDConsts::INFO(), $name));
            try {
                $this->deleteDomain($input, $output, $name);
            } catch (\Exception $e) {
                $io->error($e->getMessage());
                return 1;
            }
            $io->success(sprintf(DeleteDDDConsts::SUCC(), $name));
            return 0;
        }
    }
    
    /**
     *
     * Validates the name of the DDD directory name
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
     * Performs the domain deletion process
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param string $name
     *
     * @throws UserCancelException
     *
     * @return void
     */
    private function deleteDomain(
        InputInterface $input,
        OutputInterface $output,
        string $name
    ): void {
        $helper = $this->getHelper('question');
        
        $quest = $this->getQuestsWithHandlers($name);
        
        if ($this->ask($input, $output, $quest['question'], $helper)) {
            $quest['handler']->execute($name);
        } else {
            throw new UserCancelException;
        }
    }


    /**
     * Gets the question with its appropriate handler
     *
     * @return array
     */
    private function getQuestsWithHandlers(string $name): array
    {
        return [
            'question' => AskForDelQuest::ask($name),
            'handler' => $this->delDom
        ];
    }



    /**
     * Confirms the DDD directory deletion
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
