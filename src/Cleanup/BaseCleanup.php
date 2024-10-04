<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

class BaseCleanup
{
    public static function getConfig()
    {
        $config = \Pimcore::getContainer()->getParameter('starfruit_maintenance.cleanup_services');
        return $config;
    }
}
