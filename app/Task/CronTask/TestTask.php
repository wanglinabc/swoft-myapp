<?php

namespace App\Task\CronTask;

use Swoft\Task\Bean\Annotation\Scheduled;

/**
 * Undocumented class
 */
class TestTask
{
    /**
     * crontab定时任务
     * 每一秒执行一次
     *
     * @Scheduled(cron="* * * * * *")
     */
    public function cronTask()
    {
        echo time()."每一秒执行一次  \n";

        return 'cron';
    }

    /**
     * 每分钟第3-5秒执行.
     *
     * @Scheduled(cron="3-5 * * * * *")
     */
    public function cronooTask()
    {
        echo time()."第3-5秒执行\n";

        return 'cron';
    }
}
