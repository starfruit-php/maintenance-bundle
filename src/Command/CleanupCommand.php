<?php

namespace Starfruit\MaintenanceBundle\Command;

use Pimcore\Cache;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Starfruit\MaintenanceBundle\Cleanup\ProcessCleanupInterface;

class CleanupCommand extends AbstractCommand
{
    public function __construct(protected ProcessCleanupInterface $cleanupInterface)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('stf:maintenance:cleanup')
            ->setDescription('Clean up to release disk space');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->cleanupInterface->process();
        return AbstractCommand::SUCCESS;
    }
}
