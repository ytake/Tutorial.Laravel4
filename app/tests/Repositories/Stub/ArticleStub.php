<?php
namespace App\Tests\Repositories\Stub;

use App\Repositories\ArticleRepositoryInterface;

class ArticleStub implements ArticleRepositoryInterface
{

    public function getArticle($id)
    {

    }

    public function getArticlePaginate($perPage = 20)
    {

    }


    public function addArticle(array $attributes)
    {

    }

    public function updateArticle($id, array $attributes)
    {

    }

    public function deleteArticle($id)
    {

    }

    public function validate(array $attributes)
    {

    }

    public function getErrors()
    {

    }
} 