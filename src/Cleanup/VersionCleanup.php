<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

class VersionCleanup implements ServiceCleanupInterface
{
    public function getName(): string
    {
        return 'version';
    }

    public function cleanup(): void
    {
    }
}
