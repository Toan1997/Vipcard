<?php
declare(strict_types=1);

namespace Commercers\CronjobManager\Test\Util;

use Commercers\CronjobManager\Model\Clock;

class FakeClock implements Clock
{
    /**
     * @var int
     */
    private $timestamp;

    public function __construct(int $timestamp = 0)
    {
        $this->timestamp = $timestamp;
    }

    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function now(): int
    {
        return $this->timestamp;
    }

}
