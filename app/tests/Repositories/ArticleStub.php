<?php
namespace App\Tests\Repositories;

use App\Repositories\ArticleRepositoryInterface;

class ArticleStub implements ArticleRepositoryInterface
{
    public $array = [
        [
            'user_id' => 1,
            'article_title' => 'test',
            'article_body' => 'test',
            'created_at' => '1970-01-01 00:00:00',
            'updated_at' => '1970-01-01 00:00:00',
        ],
        [
            'user_id' => 2,
            'article_title' => 'test2',
            'article_body' => 'test2',
            'created_at' => '1970-01-01 00:00:00',
            'updated_at' => '1970-01-01 00:00:00',
        ]
    ];

    /**
     * @param $id
     * @return mixed
     */
    public function getArticle($id)
    {
        return $this->array[$id];
    }

    /**
     * @param int $perPage
     * @return mixed|void
     */
    public function getArticlePaginate($perPage = 20, $page = 1)
    {
        $separates = array_chunk($this->array, $perPage);
        return \Paginator::make($separates[$page - 1], count($this->array), $perPage);
    }


    public function addArticle(array $attributes)
    {

    }

    /**
     * @return mixed
     */
    public function getArticleAll()
    {
        // TODO: Implement getArticleAll() method.
        return $this->array;
    }

    public function updateArticle($id, array $attributes)
    {

    }

    public function deleteArticle($id)
    {
        unset($this->array[$id]);
        return 1;
    }

    public function validate(array $attributes)
    {

    }

    public function getErrors()
    {

    }
} 