<?php
$host = 'mysql-master';
$redisHost = 'redis';

$ext = new ReflectionExtension('swoole');

echo "swoole version" . $ext->getVersion() . PHP_EOL;
echo "php version" . phpversion() . PHP_EOL;

$count = 3000;
while (--$count) {
    swoole_async_dns_lookup($host, function ($host, $ip) {
        var_dump($host .':'. $ip);
    });
    swoole_async_dns_lookup($redisHost, function ($host, $ip) {
        var_dump($host .':'. $ip);
    });
}

