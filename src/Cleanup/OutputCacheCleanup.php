<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

use Pimcore\Cache;

class OutputCacheCleanup implements ServiceCleanupInterface
{
    public function getName(): string
    {
        return 'output_cache';
    }

    public function cleanup(): void
    {
        // https://pimcore.com/docs/platform/Pimcore/Administration_of_Pimcore/Cleanup_Data_Storage/#output-cache

        // remove "output" out of the ignored tags, if a cache lifetime is specified
        Cache::removeIgnoredTagOnClear('output');

        // empty document cache
        Cache::clearTags(['output', 'output_lifetime']);
    }
}
