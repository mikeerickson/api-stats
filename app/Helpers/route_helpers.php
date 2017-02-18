<?php

function endpoint()
{
    $newEndpoint = $_SERVER['REQUEST_URI'];
    if ($newEndpoint === '/') {
        $newEndpoint = "Home";
    }
    $pos = strpos($newEndpoint, "?");

    if ($pos !== false) {
        $newEndpoint = substr($newEndpoint, 0, $pos);
    }
    if (strpos($newEndpoint, 'resource') !== false) {
        $newEndpoint = "Endpoints";
    }
    return str_replace("/", "", $newEndpoint);
}

function isEndpoint($testEndpoint)
{
    if (gettype($testEndpoint) === 'array') {
        foreach ($testEndpoint as &$value) {
            if (strtolower(endpoint()) === strtolower($value)) {
                return true;
            }
        }
        return false;
    } else {
        return (strtolower(endpoint()) === strtolower($testEndpoint));
    }
}

function getEndpoint($qs)
{
    return getQueryStringParam($qs, 'endpoint');
}
function getQueryStringParam($qs, $key)
{
    $parts = http_parse_query($qs);
    return $parts[$key];
}

/**
 * Parses http query string into an array
 *
 * @author Alxcube <alxcube@gmail.com>
 *
 * @param string $queryString String to parse
 * @param string $argSeparator Query arguments separator
 * @param integer $decType Decoding type
 * @return array
 */
function http_parse_query($queryString, $argSeparator = '&', $decType = PHP_QUERY_RFC1738)
{
    $result = array();
    $parts  = explode($argSeparator, $queryString);

    foreach ($parts as $part) {
        list($paramName, $paramValue)   = explode('=', $part, 2);

        switch ($decType) {
            case PHP_QUERY_RFC3986:
                $paramName  = rawurldecode($paramName);
                $paramValue = rawurldecode($paramValue);
                break;

            case PHP_QUERY_RFC1738:
            default:
                $paramName  = urldecode($paramName);
                $paramValue = urldecode($paramValue);
                break;
        }


        if (preg_match_all('/\[([^\]]*)\]/m', $paramName, $matches)) {
            $paramName = substr($paramName, 0, strpos($paramName, '['));
            $keys      = array_merge(array($paramName), $matches[1]);
        } else {
            $keys      = array($paramName);
        }

        $target = &$result;

        foreach ($keys as $index) {
            if ($index === '') {
                if (isset($target)) {
                    if (is_array($target)) {
                        $intKeys = array_filter(array_keys($target), 'is_int');
                        $index   = count($intKeys) ? max($intKeys)+1 : 0;
                    } else {
                        $target = array($target);
                        $index  = 1;
                    }
                } else {
                    $target = array();
                    $index  = 0;
                }
            } elseif (isset($target[$index]) && !is_array($target[$index])) {
                $target[$index] = array($target[$index]);
            }

            $target = &$target[$index];
        }

        if (is_array($target)) {
            $target[] = $paramValue;
        } else {
            $target   = $paramValue;
        }
    }

    return $result;
}
