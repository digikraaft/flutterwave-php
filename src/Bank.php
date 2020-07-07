<?php

namespace Digikraaft\Flutterwave;

class Bank extends ApiResource
{
    const OBJECT_NAME = 'banks';

    /**
     * @param string $country
     * @return array|object
     *
     * @link https://developer.flutterwave.com/reference#get-all-banks
     */
    public static function list(string $country)
    {
        $url = static::endPointUrl($country);

        return static::staticRequest('GET', $url);
    }
    /**
     * @param string $bankId
     *
     * @link https://developer.flutterwave.com/reference#get-bank-branches
     * @return array|object
     */
    public static function branches(string $bankId)
    {
        $url = static::endPointUrl("{$bankId}/branches");

        return static::staticRequest('GET', $url);
    }
    /**
     * @param array $params
     *
     * @link https://developer.flutterwave.com/reference#resolve-account-transfer-details
     * @return array|object
     */
    public static function resolveAccountNumber(array $params)
    {
        self::validateParams($params, true);
        $url = urlencode("accounts/resolve");

        return static::staticRequest('POST', $url);
    }

    /**
     * @param string $bvn
     *
     * @link https://developer.flutterwave.com/reference#resolve-bvn-details
     *
     * @return array|object
     */
    public static function resolveBvn(string $bvn)
    {
        $url = urlencode("kyc/bvns/{$bvn}");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $bin
     *
     * @link https://developer.flutterwave.com/reference#resolve-card-bins
     *
     * @return array|object
     */
    public static function resolveCardBin(string $bin)
    {
        $url = "card-bins/{$bin}";

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params
     * @return array|object
     *
     * @link https://developer.flutterwave.com/reference#fx-rates
     */
    public static function fxRate(array $params)
    {
        $url = "rates";
        $url .= '?'.http_build_query($params);

        return static::staticRequest('GET', $url);
    }
}
