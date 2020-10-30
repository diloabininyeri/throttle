<?php


namespace Throttle;

/**
 * Class Time
 * @package Throttle
 */
class Time
{
    /**
     * @var int
     */
    private int $second;

    /**
     * @var int|mixed
     */
    private int $amount;

    /**
     * Time constructor.
     * @param int $second
     * @param int $amount
     */
    public function __construct(int $second = 60, $amount = 60)
    {
        $this->second = $second;
        $this->amount = $amount;
    }

    /**
     * @return int|mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int|mixed $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param int $second
     */
    public function setSecond(int $second): void
    {
        $this->second = $second;
    }

    /**
     * @return int
     */
    public function getSecond(): int
    {
        return $this->second;
    }
}
