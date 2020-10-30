<?php


use Throttle\Throttle;
use Throttle\Time;
use Throttle\Redis;

require_once 'vendor/autoload.php';

$throttle = new Throttle(
    new Time(60, 25)
);

$throttle->commit();


if ($throttle->isHasAccessLimit()) {
    print 'request can go next';
} else {
    print 'max request amount';
}


echo '<pre>';

print_r($throttle->getDetail()->toArray());


Redis::setRedisClient(new \Predis\Client($params));
