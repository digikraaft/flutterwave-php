<?php

namespace Digikraaft\Flutterwave;

class Subscription extends ApiResource
{
    const OBJECT_NAME = 'subscriptions';

    use ApiOperations\All;

    /**
     * @param string $subscriptionId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#cancel-a-subscription-1
     */
    public static function cancel(string $subscriptionId)
    {
        $url = static::endPointUrl("{$subscriptionId}/cancel");

        return static::staticRequest('PUT', $url);
    }

    /**
     * @param string $subscriptionId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#activate-a-subscription-1
     *
     */
    public static function activate(string $subscriptionId)
    {
        $url = static::endPointUrl("{$subscriptionId}/activate");

        return static::staticRequest('PUT', $url);
    }
}
