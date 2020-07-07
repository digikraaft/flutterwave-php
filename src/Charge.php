<?php

namespace Digikraaft\Flutterwave;

class Charge extends ApiResource
{
    const OBJECT_NAME = 'charges';

    /**
     * Flutterwave Documentation Reference.
     *
     * @link https://developer.flutterwave.com/reference#charge-a-card
     */
    use ApiOperations\Create;

    /**
     * @param array $params
     *
     * @link https://developer.flutterwave.com/reference#validate-a-charge
     *
     * @return array|object
     */
    public static function validate($params)
    {
        self::validateParams($params, true);
        $url = urlencode('validate-charge');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://developer.flutterwave.com/reference#charge-with-token-1
     *
     * @return array|object
     */
    public static function withToken($params)
    {
        self::validateParams($params, true);
        $url = urlencode('tokenized-charges');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://developer.flutterwave.com/reference#create-bulk-tokenized-charge
     *
     * @return array|object
     */
    public static function withMultipleTokens($params)
    {
        self::validateParams($params, true);
        $url = urlencode('bulk-tokenized-charges');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $bulkId
     * @return array|object
     *
     * @link https://developer.flutterwave.com/reference#get-bulk-tokenized-charges
     */
    public static function fetchBulkStatus(string $bulkId)
    {
        $url = urlencode("bulk-tokenized-charges/{$bulkId}");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $bulkId
     * @return array|object
     *
     * @link https://developer.flutterwave.com/reference#get-bulk-tokenized-charges-transactions
     */
    public static function fetchBulkTransactions(string $bulkId)
    {
        $url = urlencode("bulk-tokenized-charges/{$bulkId}/transactions");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $token
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#update-token-details
     */
    public static function updateToken(string $token, array $params)
    {
        self::validateParams($params, true);
        $url = urlencode("tokens/{$token}");

        return static::staticRequest('PUT', $url, $params);
    }

    /**
     * @param string $flw_ref
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#capture-preauth-charge
     */
    public static function capturePreAuthorization(string $flw_ref, array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl("{$flw_ref}/capture");

        return static::staticRequest('PUT', $url, $params);
    }

    /**
     * @param string $flw_ref
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#void-preauth-charge
     */
    public static function voidPreAuthorization(string $flw_ref, array $params)
    {
        self::validateParams($params);
        $url = static::endPointUrl("{$flw_ref}/void");

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $flw_ref
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#refund-preauth-charge
     */
    public static function refundPreAuthorization(string $flw_ref, array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl("{$flw_ref}/refund");

        return static::staticRequest('POST', $url, $params);
    }

}
