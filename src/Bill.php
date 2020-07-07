<?php

namespace Digikraaft\Flutterwave;

class Bill extends ApiResource
{
    const OBJECT_NAME = 'bills';

    use ApiOperations\All;
    use ApiOperations\Create;

    /**
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-bill-categories
     */
    public static function categories()
    {
        $url = urlencode("bill-categories");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $itemCode
     * @param array $params
     * @return array|object
     * @link https://developer.flutterwave.com/reference#validate-bill-service
     */
    public static function validate(string $itemCode, array $params)
    {
        static::validateParams($params, true);
        $url = urlencode("bill-items/{$itemCode}/validate");
        $url .= '?'.http_build_query($params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#create-bulk-bills
     */
    public static function createBulk(array $params)
    {
        self::validateParams($params, true);
        $url = urlencode("bulk-bills");

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $transactionRef
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-status-of-a-bill-payment
     */
    public static function status(string $transactionRef)
    {
        $url = static::endPointUrl("{$transactionRef}");

        return static::staticRequest('GET', $url);
    }
}
