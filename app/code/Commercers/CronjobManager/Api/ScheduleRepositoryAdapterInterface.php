<?php

namespace Commercers\CronjobManager\Api;

use Commercers\CronjobManager\Api\Data\ScheduleInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Adapter used by REST API to work around the lack of data getters and setters in \Magento\Cron\Model\Schedule
 * making the core cron model incompatible with param and result resolvers.
 */
interface ScheduleRepositoryAdapterInterface
{
    /**
     * @param int $scheduleId
     * @return \Commercers\CronjobManager\Api\Data\ScheduleInterface
     * @throws NoSuchEntityException
     */
    public function get(int $scheduleId): \Commercers\CronjobManager\Api\Data\ScheduleInterface;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Commercers\CronjobManager\Api\Data\ScheduleSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria): \Magento\Framework\Api\SearchResultsInterface;

    /**
     * @param \Commercers\CronjobManager\Api\Data\ScheduleInterface $schedule
     * @param int $scheduleId
     * @return \Commercers\CronjobManager\Api\Data\ScheduleInterface
     * @throws CouldNotSaveException
     */
    public function save(\Commercers\CronjobManager\Api\Data\ScheduleInterface $schedule, $scheduleId = null): \Commercers\CronjobManager\Api\Data\ScheduleInterface;

    /**
     * Return all jobs with given status
     *
     * @param string $status
     * @return ScheduleInterface[]
     */
    public function getByStatus($status);
}
