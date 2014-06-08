<?php
namespace App\Repositories;

/**
 * Interface ArticleRepositoryInterface
 * @package App\Repositories
 */
interface ArticleRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getArticleAll();

    /**
     * @param $id
     * @return mixed
     */
    public function getArticle($id);

    /**
     * @param int $perPage
     * @return mixed
     */
    public function getArticlePaginate($perPage = 20);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function addArticle(array $attributes);

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updateArticle($id, array $attributes);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteArticle($id);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function validate(array $attributes);

    /**
     * @return mixed
     */
    public function getErrors();
}