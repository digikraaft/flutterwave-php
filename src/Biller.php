<?php

namespace Digikraaft\Flutterwave;

class Biller extends ApiResource
{
    const OBJECT_NAME = 'billers';

    use ApiOperations\All;
    use ApiOperations\Create;

    /**
     * @param string $billerCode
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-products-under-a-agency
     */
    public static function products(string $billerCode)
    {
        $url = static::endPointUrl("{$billerCode}/products");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $billerCode
     * @param string $productCode
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-amount-to-be-paid-for-a-product
     */
    public static function productAmount(string $billerCode, string $productCode)
    {
        $url = static::endPointUrl("{$billerCode}/products/{$productCode}/orders");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $orderId
     * @param array $params
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-amount-to-be-paid-for-a-product
     */
    public static function updateOrder(string $orderId, array $params)
    {
        static::validateParams($params, true);
        $url = urlencode("product-orders/{$orderId}");

        return static::staticRequest('PUT', $url, $params);
    }
}
