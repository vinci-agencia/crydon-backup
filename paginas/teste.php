<?php

/**
 * @author lolkittens
 * @copyright 2013
 */

$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://croydon.dipmap.com:8088/cgi-bin/estoque?estoqueCroydon=FA1B-G0724-600',
    CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
));
// Send the request & save response to $resp
echo $resp = curl_exec($curl);
if(!curl_exec($curl)){
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
curl_close($curl);
?>