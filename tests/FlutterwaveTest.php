<?php

namespace Digikraaft\Flutterwave\Tests;

use Digikraaft\Flutterwave\Exceptions\InvalidArgumentException;
use Digikraaft\Flutterwave\Flutterwave;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class FlutterwaveTest extends TestCase
{
    protected $flutterwave;
    protected $mock;

    public function setUp(): void
    {
        TestHelper::setup();
        $this->flutterwave = mk::mock('Digikraaft\Flutterwave\Flutterwave');
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_returns_instance_of_flutterwave()
    {
        $this->assertInstanceOf("Digikraaft\Flutterwave\Flutterwave", $this->flutterwave);
    }

    /** @test */
    public function it_returns_invalid_api_key()
    {
        $this->expectException(InvalidArgumentException::class);
        Flutterwave::setApiKey('');
    }

    /** @test */
    public function it_returns_api_key()
    {
        Flutterwave::setApiKey('sk_apikey');
        $this->assertIsString(Flutterwave::getApiKey());
    }
}
