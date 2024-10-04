<?php

declare(strict_types=1);

namespace Starfruit\MaintenanceBundle\Cleanup;

/**
 * @internal
 */
interface ProcessCleanupInterface
{
    public function process(): void;
}
