<?php

namespace Digikraaft\Flutterwave\Tests;

use Mockery as mk;
use PHPUnit\Framework\TestCase;

class BillTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_return_categories(): void
    {
        $mock = mk::mock('alias:Bill');
        $mock->allows('categories');
        $mock->categories();
        $resources = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resources));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_validate_biller(): void
    {
        $mock = mk::mock('alias:Bill');
        $mock->allows('validate')
            ->with(mk::type('string'), mk::type('array'));
        $mock->validate('itemCode', ['params']);
        $resources = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resources));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_get_create_bulk(): void
    {
        $mock = mk::mock('alias:Bill');
        $mock->allows('createBulk')
            ->with(mk::type('array'));
        $mock->createBulk(['params']);
        $resources = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resources));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_get_status(): void
    {
        $mock = mk::mock('alias:Bill');
        $mock->allows('status')
            ->with(mk::type('string'));
        $mock->status('trasactionRef');
        $resources = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resources));
    }
}
