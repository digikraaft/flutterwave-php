<?php

namespace Digikraaft\Flutterwave;

class VirtualAccount extends ApiResource
{
    const OBJECT_NAME = 'virtual-account-numbers';

    use ApiOperations\Create;
    use ApiOperations\Fetch;

    /**
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#create-bulk-virtual-account-numbers
     */
    public static function createBulk(array $params)
    {
        self::validateParams($params, true);
        $url = urlencode("bulk-virtual-account-numbers");

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $batchId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-bulk-virtual-account-details
     */
    public static function fetchBulk(string $batchId)
    {
        $url = urlencode("bulk-virtual-account-numbers/{$batchId}");

        return static::staticRequest('GET', $url);
    }
}
