<?php

/**
 * Author   : Umayr Shahid
 * Date     : 11/4/2014
 * Time     : 3:15 PM
 */
class IPDetection
{

    protected $headers = array(
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    );

    function get()
    {
        $IPArray = array();
        foreach ($this->headers as $key) {

            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);

                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        $IPArray[$key] = $ip;
                    } else {
                        $IPArray[$key] = null;
                    }
                }
            } else {
                $value = getenv($key);
                $IPArray[$key] = $value ? $value : null;
            }
        }
        return $IPArray;
    }
} 