<?php

namespace Digikraaft\Flutterwave\Tests;

use Digikraaft\Flutterwave\Flutterwave;

class TestHelper
{
    public static function setup()
    {
        Flutterwave::$apiBase = 'https://api.flutterwave.com/v3';
        Flutterwave::setApiKey('FLWSECK_TEST-abcd12345');
    }
}
