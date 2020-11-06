<?php


namespace Throttle;

/**
 * Class Generate
 * @package Throttle
 */
class Generate
{
    public static function redisKey(Time $time, ?string $specificKey): string
    {
        $url = new Url();
        $stringUri= sprintf('%s|%s|%s|%s|%s', $url->base(), $url->ip(), $time->getSecond(), $time->getAmount(), $specificKey);
        return sha1($stringUri);
    }
}
