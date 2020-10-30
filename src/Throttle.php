<?php


namespace Throttle;

use Predis\Client;

/**
 * Class Throttle
 * @package Throttle
 */
class Throttle
{


    /**
     * @var Time
     */
    private Time $time;
    /**
     * @var string
     */
    private string $redisKey;

    /**
     * @var bool
     */
    private bool $hasAccessLimit = true;

    /**
     * Throttle constructor.
     * @param Time $time
     */
    public function __construct(Time $time)
    {
        $this->redisKey = Generate::redisKey($this->time = $time);
    }

    /**
     *
     */
    public function commit(): void
    {
        Handle::requests($this->redisKey, $this->time, $this);
    }


    /**
     * @return int
     */
    public function getSecond(): int
    {
        return $this->time->getSecond();
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->time->getAmount();
    }

    /**
     * @return Detail
     */
    public function getDetail(): Detail
    {
        return new Detail($this->redisKey, $this->time);
    }

    /**
     * @return bool
     */
    public function isHasAccessLimit(): bool
    {
        return $this->hasAccessLimit;
    }

    /**
     * @param bool $hasAccessLimit
     */
    public function setHasAccessLimit(bool $hasAccessLimit): void
    {
        $this->hasAccessLimit = $hasAccessLimit;
    }
}
