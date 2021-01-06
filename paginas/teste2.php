<?php

/**
 * @author lolkittens
 * @copyright 2013
 */
$ip = gethostbyname('croydon.dipmap.com');
echo("Curl Test\n" );

$url = "http://".$ip.":8088/cgi-bin/estoque?estoqueCroydon=FA1B-G0724-600";

$ch = curl_init();

curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_PORT => 8088,
    CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
    CURLOPT_FAILONERROR => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_TIMEOUT => 10,
));
$result = curl_exec($ch);

print_r(curl_getinfo($ch));
echo "\n\ncURL error number:" .curl_errno($ch);
echo "\n\ncURL error:" . curl_error($ch);

curl_close($ch);
echo $result; 