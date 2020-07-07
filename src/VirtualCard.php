<?php

namespace Digikraaft\Flutterwave;

class VirtualCard extends ApiResource
{
    const OBJECT_NAME = 'virtual-cards';

    /**
     * Flutterwave Documentation Reference.
     *
     * @link https://developer.flutterwave.com/reference#charge-a-card
     */
    use ApiOperations\Create;
    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     * @param string $cardId
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#fund-a-virtual-card
     */
    public static function fund(string $cardId, array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl("{$cardId}/fund");

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $cardId
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#terminate-a-virtual-card-1
     */
    public static function terminate(string $cardId)
    {
        $url = static::endPointUrl("{$cardId}/terminate");

        return static::staticRequest('PUT', $url);
    }

    /**
     * @param string $cardId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-virtual-card-transactions
     */
    public static function transactions(string $cardId)
    {
        $url = static::endPointUrl("{$cardId}/transactions");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $cardId
     * @param array $params
     *
     * @return array|object
     * @link https://developer.flutterwave.com/reference#withdraw-from-a-virtual-card
     */
    public static function withdraw(string $cardId, array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl("{$cardId}/withdraw");

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $cardId
     * @return array|object
     *
     * @link https://developer.flutterwave.com/reference#blockunblock-virtual-cards
     */
    public static function block(string $cardId)
    {
        $url = static::endPointUrl("/{$cardId}/status/block");

        return static::staticRequest('PUT', $url);
    }

    /**
     * @param string $cardId
     * @return array|object
     *
     * @link https://developer.flutterwave.com/reference#blockunblock-virtual-cards
     */
    public static function unblock(string $cardId)
    {
        $url = static::endPointUrl("/{$cardId}/status/unblock");

        return static::staticRequest('PUT', $url);
    }
}
