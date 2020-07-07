<?php

namespace Digikraaft\Flutterwave;

class Transfer extends ApiResource
{
    const OBJECT_NAME = 'transfers';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;

    /**
     * @param array $params
     *
     * @link https://developer.flutterwave.com/reference#create-bulk-transfer
     *
     * @return array|object
     */
    public static function createBulk(array $params)
    {
        self::validateParams($params, true);
        $url = urlencode('bulk-transfers');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://developers.paystack.co/reference#initiate-transfer
     *
     * @return array|object
     */
    public static function fee(array $params)
    {
        self::validateParams($params);
        $url = static::buildQueryString('fee', $params);

        return static::staticRequest('GET', $url, $params);
    }

    /**
     * @link https://developer.flutterwave.com/reference#wallet-to-wallet-transfer
     *
     * @param array $params
     * @return array|object
     */
    public static function toWallet(array $params)
    {
        static::validateParams($params, true);
        $url = urlencode('transferss');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://developers.paystack.co/reference#finalize-transfer
     *
     * @return array|object
     */
    public static function finalize($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('finalize_transfer');

        return static::staticRequest('POST', $url, $params);
    }



    /**
     * @param array $params details at
     *
     * @link https://developers.paystack.co/reference#resend-otp-for-transfer
     *
     * @return array|object
     */
    public static function resendOtp($params)
    {
        self::validateParams($params, true);
        $url = static::classUrl().'/resend_otp';

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param null|array $params details at
     *
     * @link https://developers.paystack.co/reference#disable-otp-requirement-for-transfers
     *
     * @return array|object
     */
    public static function disableOtp($params = null)
    {
        self::validateParams($params);
        $url = static::endPointUrl('resend_otp');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://developers.paystack.co/reference#finalize-disabling-of-otp-requirement-for-transfers
     *
     * @return array|object
     */
    public static function disableOtpFinalize($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('disable_otp_finalize');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://developers.paystack.co/reference#enable-otp-requirement-for-transfers
     *
     * @return array|object
     */
    public static function enableOtp($params = null)
    {
        self::validateParams($params);
        $url = static::endPointUrl('enable_otp');

        return static::staticRequest('POST', $url, $params);
    }
}
