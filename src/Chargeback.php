<?php

namespace Digikraaft\Flutterwave;

use Digikraaft\Flutterwave\ApiOperations\Fetch;

class Chargeback extends ApiResource
{
    const OBJECT_NAME = 'chargebacks';

    use ApiOperations\All;

    /**
     * @param string $reference
     * @param array $params
     * @return array|object
     * @link https://developer.flutterwave.com/reference#validate-otp-1
     */
    public static function fetch(string $reference, array $params)
    {
        $url = static::buildQueryString("", $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $chargeBackId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#acceptdecline-a-chargeback
     */
    public static function accept(string $chargeBackId)
    {
        $params = [
            'action' => 'accept',
        ];
        $url = static::endPointUrl("{$chargeBackId}");

        return static::staticRequest('GET', $url, $params);
    }

    /**
     * @param string $chargeBackId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#acceptdecline-a-chargeback
     */
    public static function decline(string $chargeBackId)
    {
        $params = [
            'action' => 'decline',
        ];
        $url = static::endPointUrl("{$chargeBackId}");

        return static::staticRequest('GET', $url, $params);
    }
}
