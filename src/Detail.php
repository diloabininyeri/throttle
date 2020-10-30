<?php


namespace Throttle;

use Predis\Client;

/**
 * Class Detail
 * @package Throttle
 */
class Detail
{
    /**
     * @var string
     */
    private string  $key;
    /**
     * @var Client
     */
    private Client  $redisClient;
    /**
     * @var Time
     */
    private Time $time;

    /**
     * Detail constructor.
     * @param string $key
     * @param Time $time
     */
    public function __construct(string $key, Time $time)
    {
        $this->key = $key;
        $this->redisClient = Redis::getRedisClient();
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getRemainingSeconds(): int
    {
        return $this->redisClient->ttl($this->key);
    }

    /**
     * @return int
     */
    public function getRemainingValue(): int
    {
        return $this->time->getAmount() - ($this->redisClient->get($this->key) ?: 0);
    }

    /**
     * @return int
     */
    public function getSecondsAmount(): int
    {
        return $this->time->getSecond();
    }

    /**
     * @return int[]
     */
    public function toArray(): array
    {
        return [
            'remaining_value' => $this->getRemainingValue(),
            'amount_request' => $this->redisClient->get($this->key),
            'amount_seconds' => $this->getSecondsAmount(),
            'remaining_seconds' => $this->getRemainingSeconds(),
        ];
    }
}
