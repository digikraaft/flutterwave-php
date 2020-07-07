<?php

namespace Digikraaft\Flutterwave;

class PaymentPlan extends ApiResource
{
    const OBJECT_NAME = 'payment-plans';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     * @param string $paymentPlanId
     * @return array|object
     * @link https://developer.flutterwave.com/reference#cancel-a-payment-plan
     */
    public static function cancel(string $paymentPlanId)
    {
        $url = static::endPointUrl("{$paymentPlanId}/cancel");

        return static::staticRequest('PUT', $url);
    }
}
