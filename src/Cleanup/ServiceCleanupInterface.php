<?php

declare(strict_types=1);

namespace Starfruit\MaintenanceBundle\Cleanup;

/**
 * @internal
 */
interface ServiceCleanupInterface
{
    public function getName(): string;
    public function cleanup(): void;
}
