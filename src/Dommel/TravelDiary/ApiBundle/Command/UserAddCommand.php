<?php

namespace Dommel\TravelDiary\ApiBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserAddCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this->setName('user:add')
                ->setDescription('Adds a user')
                ->addArgument('email', InputArgument::REQUIRED, 'E-Mail address of the user')
                ->addArgument('password', InputArgument::REQUIRED, 'Password of the user');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $registerService = $this->getContainer()->get('register_service');
        $registerService->register($input->getArgument('email'), $input->getArgument('password'));
    }

}
