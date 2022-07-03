<?php
declare(strict_types=1);

namespace Commercers\CronjobManager\Test\Integration;

use Commercers\CronjobManager\Model\Clock;
use Commercers\CronjobManager\Test\Util\FakeClock;
use Magento\Cron\Model\Schedule;
use Magento\Framework\ObjectManager\ObjectManager;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
use Magento\Framework\Event;

/**
 * @magentoAppIsolation enabled
 * @magentoAppArea crontab
 */
class CleanRunningJobsTest extends TestCase
{
    const NOW = '2019-02-09 18:33:00';
    /**
     * @var ObjectManager
     */
    private $objectManager;
    /**
     * @var Event\ManagerInterface
     */
    private $eventManager;
    /**
     * @var FakeClock
     */
    private $clock;

    const DEAD_PID = 99999999;

    protected function setUp()
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->objectManager->configure(['preferences' => [Clock::class => FakeClock::class]]);
        $this->clock = $this->objectManager->get(Clock::class);
        $this->clock->setTimestamp(strtotime(self::NOW));
        $this->eventManager = $this->objectManager->get(Event\ManagerInterface::class);
    }

    public function testDeadRunningJobsAreCleaned()
    {
        $this->givenRunningScheduleWithInactiveProcess($schedule);
        $this->whenEventIsDispatched('process_cron_queue_before');
        $this->thenScheduleHasStatus($schedule, Schedule::STATUS_ERROR);
        $this->andScheduleHasMessage($schedule, 'Process went away at ' . self::NOW);
    }

    public function testActiveRunningJobsAreNotCleaned()
    {
        $this->givenRunningScheduleWithActiveProcess($schedule);
        $this->whenEventIsDispatched('process_cron_queue_before');
        $this->thenScheduleHasStatus($schedule, Schedule::STATUS_RUNNING);
    }

    private function givenRunningScheduleWithInactiveProcess(&$schedule)
    {
        /** @var Schedule $schedule */
        $schedule = $this->objectManager->create(Schedule::class);
        $schedule->setStatus(Schedule::STATUS_RUNNING);
        $schedule->setData('pid', self::DEAD_PID);
        $schedule->save();
    }

    private function givenRunningScheduleWithActiveProcess(&$schedule)
    {
        /** @var Schedule $schedule */
        $schedule = $this->objectManager->create(Schedule::class);
        $schedule->setStatus(Schedule::STATUS_RUNNING);
        $schedule->setData('pid', \getmypid());
        $schedule->save();
    }

    private function whenEventIsDispatched($eventName)
    {
        $this->eventManager->dispatch($eventName);
    }

    private function thenScheduleHasStatus(Schedule $schedule, $expectedStatus)
    {
        /** @var \Magento\Cron\Model\ResourceModel\Schedule $scheduleResource */
        $scheduleResource = $this->objectManager->get(\Magento\Cron\Model\ResourceModel\Schedule::class);
        $scheduleResource->load($schedule, $schedule->getId());
        $this->assertEquals($expectedStatus, $schedule->getStatus(), 'Schedule should have expected status');
    }

    private function andScheduleHasMessage(Schedule $schedule, $expectedMessage)
    {
        /** @var \Magento\Cron\Model\ResourceModel\Schedule $scheduleResource */
        $scheduleResource = $this->objectManager->get(\Magento\Cron\Model\ResourceModel\Schedule::class);
        $scheduleResource->load($schedule, $schedule->getId());
        $this->assertEquals($expectedMessage, $schedule->getMessages(), 'Schedule should have expected message');
    }
}
