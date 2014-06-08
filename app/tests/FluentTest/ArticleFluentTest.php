<?php
namespace App\Tests\FluentTest;

use App\Repositories\Fluent\ArticleRepository;
use App\Repositories\Fluent\UserRepository;
use App\Tests\TestCase;
use Mockery as m;

class ArticleFluentTest extends TestCase
{
    /** @var \App\Repositories\Fluent\ArticleRepository */
    protected $article;
    /** @var \App\Repositories\Fluent\UserRepository  */
    protected $user;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->article = new ArticleRepository();
        $this->user = new UserRepository();
    }

    /**
     * @expectedException \Illuminate\Database\QueryException
     */
    public function testInsertNull()
    {
        $this->article->addArticle([]);
    }

    /**
     *
     */
    public function testInsertAndDelete()
    {
        $user = $this->user->all();
        $params = [
            'user_id' => $user[0]->user_id,
            'article_title' => 'test',
            'article_body' => 'test',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $userId = $this->article->addArticle($params);
        $this->assertNotNull($userId);
        $this->assertSame(1, $this->article->delete($userId));
        $this->assertNull($this->article->find($userId));
    }
}