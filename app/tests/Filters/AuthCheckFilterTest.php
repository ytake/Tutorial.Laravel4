<?php
namespace App\Tests\Filters;

use App\Tests\TestCase;

class AuthCheckFilterTest extends TestCase
{
    /** @var \App\Filters\AuthCheckFilter */
    protected $filter;

    public function setUp()
    {
        parent::setUp();
        $this->filter = new \App\Filters\AuthCheckFilter();
    }

    public function testFilter()
    {
        \Auth::shouldReceive('check')->once()->andReturn(true);
        $this->assertInstanceOf('Illuminate\Http\RedirectResponse', $this->filter->filter());
    }

    public function testFilterDisabled()
    {
        \Auth::shouldReceive('check')->once()->andReturn(false);
        $this->assertNull($this->filter->filter());
    }
}