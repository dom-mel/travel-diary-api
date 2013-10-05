<?php
namespace Dommel\TravelDiary\ApiBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SessionMaintainCommand extends ContainerAwareCommand {
    protected function configure()
    {
        $this->setName('session:maintain')
                ->setDescription('maintains sessions -> removes old ones');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('session_service')->deleteOldSessions();
    }

}
