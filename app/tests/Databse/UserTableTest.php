<?php
namespace App\Tests\Database;

use App\Tests\TestCase;

class UserTableTest extends TestCase
{
    /** @var array */
    protected $databaseColumns = [
        'user_id', 'user_name', 'remember_token', 'password', 'created_at', 'updated_at'
    ];

    public function setUp()
    {
        parent::setUp();
        $this->prepareForTests();
    }

    public function testSeederData()
    {
        $result = \DB::connection()->table('users')->first();
        foreach($result as $key => $val) {
            $this->assertNotNull(array_search($key, $this->databaseColumns));
        }
    }
} 