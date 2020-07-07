# Conveniently interact with the Flutterwave API with ease!
![run-tests](https://github.com/digikraaft/flutterwave-php/workflows/run-tests/badge.svg)
[![Build Status](https://travis-ci.com/digikraaft/flutterwave-php.svg?token=6YhB5FxJsF7ENdMM7Mzz&branch=master)](https://travis-ci.com/digikraaft/flutterwave-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/digikraaft/flutterwave-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/digikraaft/flutterwave-php/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/digikraaft/flutterwave-php/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

This package provides an expressive and convenient way to interact with the [Flutterwave API](https://developer.flutterwave.com/reference).

## Installation

You can install the package via composer:

```bash
composer require digikraaft/flutterwave-php
```

## Usage

All APIs documented in Flutterwave's [Developer Reference](https://developer.flutterwave.com/reference) 
are currently supported by this package.
Using the individual API follows a general convention so that it can be simple and predictable.

```
<?php 

{API_NAME}::{API_END_POINT}();

```
Before this, the API key needs to be set. For example, to access the `payment-plans` endpoint,
```
<?php 

include_once('vendor/autoload.php');

use Digikraaft\Flutterwave\Flutterwave;
use Digikraaft\Flutterwave\PaymentPlan;

Flutterwave::setApiKey('FLWSECK_TEST_1234abcd');
$plans = PaymentPlan::list();

```
You can easily pass parameters to be sent as arguments to the `API_END_POINT` method like this:
```
<?php

include_once('vendor/autoload.php');

use Digikraaft\Flutterwave\Flutterwave;
use Digikraaft\Flutterwave\PaymentPlan;

Flutterwave::setApiKey('FLWSECK_TEST_1234abcd');

$params = [
    'from' => '2020-07-07',
    'to' => '2020-07-07',
    'currency' => 'NGN',
];

$plans = PaymentPlan::list($params);

```
This also applies to `POST` and `PUT` requests.

For endpoints that require path parameters like the `fetch customer` with the request like `/payment-plans/{id}`,
simply pass in a string into the `API_END_POINT` like this:

```
<?php

include_once('vendor/autoload.php');

use Digikraaft\Flutterwave\Flutterwave;
use Digikraaft\Flutterwave\PaymentPlan;

Flutterwave::setApiKey('FLWSECK_TEST_1234abcd');
$plan = PaymentPlan::fetch('12345678');

```

For `API_END_POINT`s that take both path and body parameters like the `update payment-plan` with the `PUT` request `payment-plans/{id}`,
simply pass in a string as the first argument, an array as the second like this:

```
<?php
include_once('vendor/autoload.php');

use Digikraaft\Flutterwave\Flutterwave;
use Digikraaft\Flutterwave\PaymentPlan;

Flutterwave::setApiKey('FLWSECK_TEST_1234abcd');

$params = [
    'name' => 'Gym Membership',
    'status' => 'active',
];

$plan = PaymentPlan::update('12345678', $params);

```

There are a few exceptions to the `API_END_POINT` convention.

Check the wiki page [here](../../wiki) for detailed reference of the available methods

<br><br>
This package returns the exact response from the Flutterwave API but as the `stdClass` type 
such that responses can be accessed like this:

```
<?php

include_once('vendor/autoload.php');

use Digikraaft\Flutterwave\Flutterwave;
use Digikraaft\Flutterwave\PaymentPlan;

Flutterwave::setApiKey('FLWSECK_TEST_1234abcd');
$plan = PaymentPlan::fetch('12345678');

if ($plan->status == 'success') {
    echo $plan->data->name;
}

```
Future updates will see to improving on how the response object is handled.

## Documentation
For detailed documentation, check the wiki page [here](../../wiki)

## Todo
* More tests
* Better API response handling

## Testing

``` bash
composer test
```
## More Good Stuff
Check [here](https://github.com/digikraaft) for more awesome free stuff!

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email dev@digitalkraaft.com instead of using the issue tracker.

## Credits

- [Tim Oladoyinbo](https://github.com/timoladoyinbo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
