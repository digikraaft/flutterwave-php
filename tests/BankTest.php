<?php

namespace Digikraaft\Flutterwave;

use Digikraaft\Flutterwave\Tests\TestHelper;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_can_return_all_banks()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('list')->with(mk::type('string'));
        $mock->list('ng');
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }

    /** @test */
    public function it_can_get_bank_branches()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('branches')->with(mk::type('string'));
        $mock->branches('bankId');
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }

    /** @test */
    public function it_can_resolve_account_number()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('resolveAccountNumber')->with(mk::type('array'));
        $mock->resolveAccountNumber(['array']);
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }

    /** @test */
    public function it_can_resolve_bvn()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('resolveBvn')->with(mk::type('string'));
        $mock->resolveBvn('bvn');
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }
    /** @test */
    public function it_can_resolve_card_bin()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('resolveCardBin')->with(mk::type('string'));
        $mock->resolveCardBin('cardBin');
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }
}
