<?php

namespace Commercers\CronjobManager\Test\Integration\Model;

use Magento\Cron\Model\Schedule;
use PHPUnit\Framework\TestCase;
use Magento\TestFramework\Helper\Bootstrap;
use Commercers\CronjobManager\Model\Manager;
use Magento\Cron\Model\ScheduleFactory;

class ManagerTest extends TestCase
{
    const FIXTURE_CRON_ID = 1;
    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var ScheduleFactory
     */
    private $scheduleFactory;

    protected function setUp()
    {
        $objectManager = Bootstrap::getObjectManager();
        
        $this->manager = $objectManager->create(Manager::class);
        $this->scheduleFactory = $objectManager->create(ScheduleFactory::class);
    }

    public function testCreateCronJob()
    {
        $cronJob = $this->manager->createCronJob(
            'expired_tokens_cleanup',
            strftime('%Y-%m-%dT%H:%M', strtotime('+5 minutes'))
        );

        $this->assertInstanceOf(Schedule::class, $cronJob);
    }

    /**
     * @magentoDataFixture loadDataFixtureCron
     */
    public function testSaveCronJob()
    {
        $this->manager->saveCronJob(self::FIXTURE_CRON_ID, null, Schedule::STATUS_SUCCESS);
        $cron = $this->loadCron(self::FIXTURE_CRON_ID);

        $this->assertEquals(Schedule::STATUS_SUCCESS, $cron->getStatus());
    }

    /**
     * @expectedException \Magento\Framework\Exception\NoSuchEntityException
     */
    public function testSaveCronInvalidId()
    {
        $this->manager->saveCronJob(99999);
    }

    /**
     * @magentoDataFixture loadDataFixtureCron
     */
    public function testDeleteCronJob()
    {
        $this->manager->deleteCronJob(self::FIXTURE_CRON_ID);
        $cron = $this->loadCron(self::FIXTURE_CRON_ID);

        $this->assertNull($cron->getScheduleId());
    }

    /**
     * @expectedException \Magento\Framework\Exception\NoSuchEntityException
     */
    public function testDeleteInvalidId()
    {
        $this->manager->deleteCronJob(99999);
    }

    public function testGetCronJobs()
    {
        $jobs = $this->manager->getCronJobs();

        $this->assertArrayHasKey('default', $jobs);
    }

    public static function loadDataFixtureCron()
    {
        include __DIR__ . '/../_files/cron.php';
    }

    /**
     * @param int $id
     * @return \Magento\Cron\Model\Schedule
     */
    private function loadCron($id)
    {
        $cron = $this->scheduleFactory->create();
        $cron->getResource()->load($cron, $id);

        return $cron;
    }
}
