<?php
namespace App\Tests\Database;

use App\Tests\TestCase;

class DatabaseSeederTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->prepareForTests();
    }

    public function testUsersAll()
    {
        $result = \DB::connection()->table('users')->get();
        $this->assertEquals(1, count($result));
    }

    public function testGetUser()
    {
        $userAll = \DB::connection()->table('users')->get();
        $result = \DB::connection()->table('users')
            ->where('user_id', $userAll[0]->user_id)->first();
        $this->assertEquals('tanaka@sai-net.jp', $result->user_name);
    }
} 