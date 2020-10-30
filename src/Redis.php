<?php


namespace Throttle;

use Predis\Client;

/**
 * Class Config
 * @package Throttle
 */
class Redis
{
    /**
     * @var Client
     */
    private static Client  $client;

    /**
     * @return Client
     */
    public static function getRedisClient(): Client
    {
        return self::$client ?? new Client();
    }

    /**
     * @param Client $client
     * @return Client
     */
    public static function setRedisClient(Client $client): Client
    {
        return self::$client = $client;
    }
}
