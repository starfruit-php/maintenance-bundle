<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

class LogDataCleanup implements ServiceCleanupInterface
{
    public function getName(): string
    {
        return 'log_data';
    }

    public function cleanup(): void
    {
    }
}
