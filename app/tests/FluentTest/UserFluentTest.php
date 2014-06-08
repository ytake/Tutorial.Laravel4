<?php
namespace App\Tests\FluentTest;

use App\Repositories\Fluent\UserRepository;
use App\Tests\TestCase;
use Mockery as m;

class UserFluentTest extends TestCase
{
    /** @var \App\Repositories\Fluent\UserRepository */
    protected $user;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->user = new UserRepository();
    }

    public function testUserAll()
    {
        $this->assertEquals(1, count($this->user->all()));
    }

    public function testUserRow()
    {
        $result = $this->user->all();
        $user = $this->user->find($result[0]->user_id);
        $this->assertEquals(1, count($user));
    }
}