<?php

namespace Commercers\CronjobManager\Test\Integration\Controller\Adminhtml\Manage;

use Magento\TestFramework\TestCase\AbstractBackendController;

class CreateTest extends AbstractBackendController
{
    protected $uri = 'backend/cronjobmanager/manage/create';

    protected $resource = 'Commercers_CronjobManager::cronjobmanager';

    public function testEditAction()
    {
        $this->dispatch($this->uri);
        $result = $this->getResponse()->getBody();

        $this->assertContains('<title>Create Cron Job / Tools / System / Magento Admin</title>', $result);
    }
}
