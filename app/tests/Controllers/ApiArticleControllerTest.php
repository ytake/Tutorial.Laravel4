<?php
namespace App\Tests\Controllers;

use App\Tests\TestCase;

class ApiArticleControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        \Route::enableFilters();
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testNotFoundIndex()
    {
        $this->client->request('PATCH', '/api/v1/article');
        $this->assertRedirectedTo('/');
    }

    /**
     * @expectedException \Illuminate\Session\TokenMismatchException
     */
    public function testCommonPostToken()
    {
        $this->client->request('POST', '/api/v1/article');
    }
    /**
     *
     */
    public function testIndex()
    {
        $this->client->request('GET', '/api/v1/article');
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $this->client->getResponse());
    }
}