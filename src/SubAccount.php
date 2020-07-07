<?php

namespace Digikraaft\Flutterwave;

class SubAccount extends ApiResource
{
    const OBJECT_NAME = 'subaccounts';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     * @param string $subAccountId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#delete-a-subaccount-1
     */
    public static function delete(string $subAccountId)
    {
        $url = static::endPointUrl("{$subAccountId}");

        return static::staticRequest('DELETE', $url);
    }
}
