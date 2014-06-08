<?php
namespace App\Tests\Filters;

use App\Tests\TestCase;

class PostOnceFilterTest extends TestCase
{
    protected $filter;

    public function setUp()
    {
        parent::setUp();
    }

    public function testSeparate()
    {
        list($controller, $method) = explode('@', 'App\Tests\Controllers\TestController@getIndex');
        $reflectionClass = new \ReflectionClass($controller);
        $constant = $reflectionClass->getConstant('SESSION_KEY');
        $this->assertSame('App\Tests\Controllers\TestController', $controller);
        $this->assertSame('getIndex', $method);
        $this->assertSame('test', $constant);
    }
}
