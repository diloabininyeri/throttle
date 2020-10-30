#### PHP rate limit library with redis  
install with composer
```console
composer require zeus/throttle:dev-master
```
Sets http request limitations, such as only 100 accesses in 10 minutes
Powerful redis handles HTTP requests, you can easily integrate it into all api or projects

```php
use Throttle\Throttle;
use Throttle\Time;

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




```
#### if you want to configure a redis client

```php

use Throttle\Redis;


Redis::setRedisClient(new \Predis\Client($params));

$throttle = new Throttle(
    new Time(60, 25)
);

$throttle->commit();


if ($throttle->isHasAccessLimit()) {
    print 'request can go next';
} else {
    print 'max request amount';
}

```
Get detail 

```php

$throttle->getDetail()->toArray();
```