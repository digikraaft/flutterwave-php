<?php

namespace Digikraaft\Flutterwave;

class Transaction extends ApiResource
{
    const OBJECT_NAME = 'transactions';

    use ApiOperations\All;

    /**
     * @param array $params details at
     *
     * @link https://developer.flutterwave.com/reference#get-transaction-fee
     *
     * @return array|object
     */
    public static function fee(array $params)
    {
        self::validateParams($params);
        $url = static::buildQueryString('fee', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $transactionId
     * @param array $params details of parameter content at
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#resend-transaction-webhook
     */
    public static function resendWebHook(string $transactionId, array $params)
    {
        self::validateParams($params);
        $url = static::buildQueryString('{$transactionId}/resend-hook', $params);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $transactionId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#verify-transaction
     */
    public static function verify(string $transactionId)
    {
        $url = static::endPointUrl("{$transactionId}/verify");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $transactionId
     * @param array $params details of parameter content at
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#transaction-refund
     */
    public static function refund(string $transactionId, array $params)
    {
        self::validateParams($params);
        $url = static::endPointUrl("{$transactionId}/refund");

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $transactionId details at
     *
     * @link https://developers.paystack.co/reference#view-transaction-timeline
     *
     * @return array|object
     */
    public static function timeline(string $transactionId)
    {
        $url = static::endPointUrl("{$transactionId}/events");

        return static::staticRequest('GET', $url);
    }
}
