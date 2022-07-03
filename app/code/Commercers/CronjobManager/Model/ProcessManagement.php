<?php
declare(strict_types=1);

namespace Commercers\CronjobManager\Model;

class ProcessManagement
{
    const SIGKILL = 9;

    public function isPidAlive(int $pid): bool
    {
        return \file_exists('/proc/' . $pid);
    }

    public function killPid($pid): bool
    {
        if (!$this->isPidAlive($pid)) {
            return false;
        }
        //TODO first try to send SIGINT, wait up to X seconds, then send SIGKILL if process still running
        $killed = \posix_kill($pid, self::SIGKILL);
        if ($killed && !$this->isPidAlive($pid)) {
            \sleep(5);
            if ($this->isPidAlive($pid)) {
                return false;
            }
        }
        return $killed;

    }
}
