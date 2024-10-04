<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

use Pimcore\Db;
use Carbon\Carbon;

class RecycleBinCleanup implements ServiceCleanupInterface
{
    const CONFIG_NAME = 'recycle_bin';

    public function getName(): string
    {
        return self::CONFIG_NAME;
    }

    public function cleanup(): void
    {
        // https://pimcore.com/docs/platform/Pimcore/Administration_of_Pimcore/Cleanup_Data_Storage/#recycle-bin

        $config = BaseCleanup::getConfig();
        $maxDays = isset($config[self::CONFIG_NAME]['max_days']) ? $config[self::CONFIG_NAME]['max_days'] : 60;
        $this->cleanupFiles($maxDays);
        $this->cleanupDatabase($maxDays);
    }

    private function cleanupFiles($maxDays)
    {
        BaseCleanup::runCommandLine('pimcore:recyclebin:cleanup --older-than-days=' . $maxDays);
    }

    private function cleanupDatabase($maxDays)
    {
        $now = Carbon::now();
        $checkDate = $now->subDays($maxDays);
        $checkTimestamp = $checkDate->timestamp;

        $query = "DELETE FROM `recyclebin` WHERE `date` <= ?";
        Db::get()->executeQuery($query, [$checkTimestamp]);
    }
}
