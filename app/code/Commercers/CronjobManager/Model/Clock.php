<?php
declare(strict_types=1);

namespace Commercers\CronjobManager\Model;

interface Clock
{
    public function now(): int;
}
