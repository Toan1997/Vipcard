<?php

namespace Commercers\CronjobManager\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ScheduleSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Commercers\CronjobManager\Api\Data\ScheduleInterface[]
     */
    public function getItems();

    /**
     * @param \Commercers\CronjobManager\Api\Data\ScheduleInterface[]
     * @return $this
     */
    public function setItems(array $items);
}
