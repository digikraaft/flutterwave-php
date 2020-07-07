<?php

namespace Digikraaft\Flutterwave;

class Beneficiary extends ApiResource
{
    const OBJECT_NAME = 'beneficiaries';

    use ApiOperations\All;
    use ApiOperations\Create;

    /**
     * @param string $beneficiaryId
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @link https://developer.flutterwave.com/reference#delete-a-beneficiary
     *
     */
    public static function delete(string $beneficiaryId)
    {
        $url = static::endPointUrl($beneficiaryId);

        return static::staticRequest('DELETE', $url);
    }
}
