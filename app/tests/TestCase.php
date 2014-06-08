<?php
namespace App\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTest;

class TestCase extends BaseTest
{
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
        \Artisan::call('migrate');
        \Artisan::call('db:seed');
    }
}
