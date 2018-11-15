<?php


namespace App\Service;


use App\Application\ApplicationInterface;
use App\Structs\BuildInterface;

class RedisDownloadCounter implements DownloadCounterInterface
{

    /** @var \Redis */
    private $redis;

    public function boot(): void
    {
        $this->redis = new \Redis();
        $this->redis->connect(getenv('REDIS_HOST'));
        $this->redis->setOption(\Redis::OPT_SCAN, \Redis::SCAN_RETRY);
    }

    public function getName(): string
    {
        return 'redis';
    }

    public function increaseCounter(ApplicationInterface $application, BuildInterface $build): void
    {
        $this->redis->incr($this->getKeyForBuild($application, $build));
    }

    public function getCount(ApplicationInterface $application, BuildInterface $build): int
    {
        return $this->redis->get($this->getKeyForBuild($application, $build));
    }

    private function getKeyForBuild(ApplicationInterface $application, BuildInterface $build): string
    {
        return 'dl_cnt_' . $application->getName() . '_' . $build->getFileName();
    }

    public function getCountForApplication(ApplicationInterface $application): int
    {
                $count = 0;
        while ($arr_keys = $this->redis->scan($iterate, $this->getKeyForApplication($application) . '*')) {
            foreach ($arr_keys as $str_key) {
                $count += $this->redis->get($str_key);
            }
        }

        return $count;
    }

    private function getKeyForApplication(ApplicationInterface $application): string
    {
        return 'dl_cnt_' . $application->getName();
    }

    public function getTotalCount(): int
    {
        $count = 0;
        while ($arr_keys = $this->redis->scan($iterate, $this->getBaseKey() . '*')) {
            foreach ($arr_keys as $str_key) {
                $count += $this->redis->get($str_key);
            }
        }

        return $count;
    }

    private function getBaseKey(): string
    {
        return 'dl_cnt';
    }
}