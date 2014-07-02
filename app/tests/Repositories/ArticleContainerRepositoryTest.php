<?php
namespace App\Tests\Controllers;

use App\Tests\TestCase;

class ArticleContainerRepositoryTest extends TestCase
{
    /** @var \App\Tests\Repositories\ArticleStub */
    protected $article;

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\Repositories\ArticleRepositoryInterface", "App\Tests\Repositories\ArticleStub");
        $this->article = \App::make("App\Repositories\ArticleRepositoryInterface");
    }

    public function testStub()
    {
        $one = $this->article->getArticle(1);
        $this->assertSame(2, $one['user_id']);
        $this->assertSame('test2', $one['article_title']);
        $this->assertSame('test2', $one['article_body']);
        $two = $this->article->getArticle(0);
        $this->assertSame(1, $two['user_id']);
        $this->assertSame('test', $two['article_title']);
        $this->assertSame('test', $two['article_body']);
    }
}