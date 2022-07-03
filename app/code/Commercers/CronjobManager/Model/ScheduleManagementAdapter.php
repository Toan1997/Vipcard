<?php

namespace Commercers\CronjobManager\Model;

use Commercers\CronjobManager\Api\Data;
use Commercers\CronjobManager\Api\ScheduleManagementAdapterInterface;
use Commercers\CronjobManager\Api\Data\ScheduleInterfaceFactory;
use Commercers\CronjobManager\Api\ScheduleManagementInterface;

class ScheduleManagementAdapter implements ScheduleManagementAdapterInterface
{
    /**
     * @var ScheduleInterfaceFactory
     */
    private $scheduleFactory;

    /**
     * @var ScheduleManagementInterface
     */
    private $scheduleManagement;

    public function __construct(
        ScheduleInterfaceFactory $scheduleFactory,
        ScheduleManagementInterface $scheduleManagement
    ) {
        $this->scheduleFactory = $scheduleFactory;
        $this->scheduleManagement = $scheduleManagement;
    }

    public function scheduleNow(string $jobCode): Data\ScheduleInterface
    {
        $coreSchedule = $this->scheduleManagement->scheduleNow($jobCode);

        return $this->scheduleFactory->create(['data' => $coreSchedule->getData()]);
    }

    public function schedule(string $jobCode, int $time): Data\ScheduleInterface
    {
        $coreSchedule = $this->scheduleManagement->schedule($jobCode, $time);

        return $this->scheduleFactory->create(['data' => $coreSchedule->getData()]);
    }
}
