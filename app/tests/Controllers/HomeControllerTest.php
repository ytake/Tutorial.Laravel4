<?php
namespace App\Tests\Controllers;

use App\Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testNotFoundIndex()
    {
        $this->client->request('GET', 'homes');
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testIndexPost()
    {
        $this->client->request('POST', 'home');
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testIndexPut()
    {
        $this->client->request('PUT', 'home');
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testIndexDelete()
    {
        $this->client->request('DELETE', 'home');
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testIndexPatch()
    {
        $this->client->request('PATCH', 'home');
    }

    public function testIndex()
    {
        $this->client->request('GET', '');
        $this->assertResponseOk();
        $this->assertViewHas('list');
    }
}