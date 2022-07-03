<?php

namespace Commercers\CronjobManager\Api;

/**
 * Adapter used by REST API to work around the lack of data getters and setters in \Magento\Cron\Model\Schedule
 * making the core cron model incompatible with param and result resolvers.
 */
interface ScheduleManagementAdapterInterface
{
    /**
     * @param string $jobCode
     * @return \Commercers\CronjobManager\Api\Data\ScheduleInterface
     */
    public function scheduleNow(string $jobCode): Data\ScheduleInterface;

    /**
     * @param string $jobCode
     * @param int $time
     * @return \Commercers\CronjobManager\Api\Data\ScheduleInterface
     */
    public function schedule(string $jobCode, int $time): Data\ScheduleInterface;
}
