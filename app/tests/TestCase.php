<?php
namespace App\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTest;
use \Mockery as m;

class TestCase extends BaseTest
{
    protected $useDatabase = true;

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__.'/../../bootstrap/start.php';
    }

    /**
     * Migrate the database
     */
    protected function prepareForTests()
    {
        \Artisan::call("migrate:reset");
        \Artisan::call('migrate');
        \Artisan::call('db:seed');
    }
    
    public function setUp()
    {
        parent::setUp();
        if($this->useDatabase)
        {
            $this->setUpDb();
        }
    }
 
    public function teardown()
    {
        m::close();
    }
 
    public function setUpDb()
    {
        \Artisan::call('migrate');
        \Artisan::call('db:seed');
    }
 
    public function teardownDb()
    {
        \Artisan::call('migrate:reset');
    }
}
