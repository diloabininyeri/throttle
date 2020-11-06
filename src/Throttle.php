<?php


namespace Throttle;

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
     * @var string|null
     */
    private ?string $specificKey;

    /**
     * Throttle constructor.
     * @param Time $time
     * @param string|null $specificKey
     */
    public function __construct(Time $time, ?string $specificKey=null)
    {
        $this->redisKey = Generate::redisKey($this->time = $time, $specificKey);
        $this->specificKey = $specificKey;
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

    /**
     * @return string|null
     */
    public function getSpecificKey(): ?string
    {
        return $this->specificKey;
    }

    /**
     * @param string|null $specificKey
     */
    public function setSpecificKey(?string $specificKey): void
    {
        $this->specificKey = $specificKey;
    }
}
