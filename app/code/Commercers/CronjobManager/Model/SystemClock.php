<?php
declare(strict_types=1);

namespace Commercers\CronjobManager\Model;

class SystemClock implements Clock
{
    public function now(): int
    {
        return \time();
    }
}
