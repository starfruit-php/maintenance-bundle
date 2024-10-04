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
        // https://pimcore.com/docs/platform/Pimcore/Administration_of_Pimcore/Cleanup_Data_Storage/#versioning-data

        // https://pimcore.com/docs/platform/Pimcore/Tools_and_Features/System_Settings

        BaseCleanup::runCommandLine('pimcore:maintenance -j versioncleanup');
    }
}
