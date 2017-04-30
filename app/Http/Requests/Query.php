<?php

class Query {
    public static function rebuild($uri, array $identifiers, array $params, array $defaults = [])
    {
        if (gettype($uri) !== 'string') {
            throw new Exception('URI must be a string.');
            
        }

        $rebuiltQuery = [];
        foreach ($identifiers as $index => $identifier) {
            if (preg_match($identifier, $params[$index])) {
                $rebuiltQuery[] = $param;
            } elseif (isset($defaults[$index])) {
                $rebuiltQuery[] = $defaults[$index];
            } else {
                // returning false instead of throwing an exception here so that the user can be shown a 404 page if this function fails
                return false;
            }
        }

        $rebuiltQuery = implode('/', $rebuiltQuery);

        if ($rebuiltQuery !== implode('/', $params)) {
            header('Location: ' . $uri . $rebuiltQuery . '/');
            die;
        }

        return true;
    }

    public static function rearrange($uri, array $identifiers, array $params, array $defaults = [], $strict = true)
    {
        if (gettype($uri) !== 'string') {
            throw new Exception('URI must be a string.');
            
        }

        $rebuiltQuery = [];
        $pendingParams = $params;

        foreach ($identifiers as $index => $identifier) {
            $nextParam = NULL;

            foreach ($pendingParams as $param) {
                if (preg_match($identifier, $param)) {
                    $nextParam = $param;
                    unset($pendingParams[$param]);
                    break;
                }
            }

            // if it goes through all the params and doesn't find the one it wants...
            if (!isset($nextParam)) {
                if (isset($defaults[$index])) {
                    $nextParam = $defaults[$index];
                } else {
                    // if strict mode is enabled...
                    if ($strict) {
                        // returning false instead of throwing an exception here so that the user can be shown a 404 page if this function fails
                        return false;
                    } else {
                        continue;
                    }
                }
            }

            $rebuiltQuery[] = $param;
        }

        $rebuiltQuery = implode('/', $rebuiltQuery);

        if ($rebuiltQuery !== implode('/', $params)) {
            header('Location: ' . $uri . $rebuiltQuery . '/');
            die;
        }

        return true;
    }

    public static function nonstrictRearrange($uri, $identifiers, $params, $defaults = [])
    {
        static::rearrange($uri, $identifiers, $params, $defaults, false);
    }
}