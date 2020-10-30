<?php


namespace Throttle;

/**
 * Class Handle
 * @package Throttle
 */
class Handle
{
    /**
     * @param string $key
     * @param Time $time
     * @param Throttle $throttle
     */
    public static function requests(string $key, Time $time, Throttle $throttle): void
    {
        $client = Redis::getRedisClient();
        $value = $client->get($key);


        if ($client->ttl($key) > 0 && $value<=$throttle->getAmount()) {
            $client->incr($key);
        } elseif ($client->ttl($key) <= 0) {
            $client->setex($key, $time->getSecond(), 0);
        } elseif ($value >= $throttle->getAmount()) {
            $throttle->setHasAccessLimit(false);
        } else {
            $client->setex($key, $time->getSecond(), 0);
        }
    }
}
