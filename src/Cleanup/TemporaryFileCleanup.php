<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

class TemporaryFileCleanup implements ServiceCleanupInterface
{
    public function getName(): string
    {
        return 'temporary_file';
    }

    public function cleanup(): void
    {
        $this->cleanupSystemTempDirectory();
    }

    private function cleanupSystemTempDirectory(): void
    {
        // ref: https://pimcore.com/docs/platform/Pimcore/Administration_of_Pimcore/Cleanup_Data_Storage/#clearing-temporary-files

        recursiveDelete(PIMCORE_SYSTEM_TEMP_DIRECTORY, false);
    }
}
