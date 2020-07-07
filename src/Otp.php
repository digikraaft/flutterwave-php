<?php

namespace Digikraaft\Flutterwave;

class Otp extends ApiResource
{
    const OBJECT_NAME = 'otps';

    use ApiOperations\Create;

    /**
     * @param string $reference
     * @param array $params
     * @return array|object
     * @link https://developer.flutterwave.com/reference#validate-otp-1
     */
    public static function validate(string $reference, array $params)
    {
        $url = static::endPointUrl("{$reference}/validate");

        return static::staticRequest('POST', $url, $params);
    }
}
