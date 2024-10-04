<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

use Symfony\Component\Process\Process;

class BaseCleanup
{
    public static function getConfig()
    {
        $config = \Pimcore::getContainer()->getParameter('starfruit_maintenance.cleanup_services');
        return $config;
    }

    public static function runCommandLine($command)
    {
        $process = new Process(explode(' ', 'php '. str_replace("\\", '/', PIMCORE_PROJECT_ROOT) .'/bin/console ' . $command), null, null, null, 900);

        $process->run();
    }
}
