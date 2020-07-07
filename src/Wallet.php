<?php

namespace Digikraaft\Flutterwave;

class Wallet extends ApiResource
{
    const OBJECT_NAME = 'balances';

    use ApiOperations\All;
    use ApiOperations\Create;

    /**
     * @param string $currency
     * @return array|object
     * @link https://developer.flutterwave.com/reference#get-balances-per-currency
     */
    public static function balanceByCurrency(string $currency)
    {
        $url = static::endPointUrl("{currency}");

        return static::staticRequest('DELETE', $url);
    }
}
