<?php
namespace App\Repositories\Fluent;

use App\Repositories\ArticleRepositoryInterface;

/**
 * Class ArticleRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ArticleRepository extends AbstractFluent implements ArticleRepositoryInterface
{
    // validator rule
    use \App\Validators\Rule;

    /** @var string  */
    protected $cacheKey = "article:";

    /** @var string */
    protected $table = 'articles';

    /** @var  */
    protected $primary = 'article_id';

    /**
     * @return mixed|\stdClass
     */
    public function getArticleAll()
    {
        return $this->all();
    }

    /**
     * @param $id
     * @return \stdClass
     */
    public function getArticle($id)
    {
        return $this->find($id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function addArticle(array $attributes)
    {
        return $this->add($attributes);
    }

    /**
     * @param int $perPage
     * @return \Illuminate\Pagination\Paginator
     */
    public function getArticlePaginate($perPage = 20)
    {
        return $this->getConnection('sqlite')->paginate($perPage);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return int
     */
    public function updateArticle($id, array $attributes)
    {
        return $this->update($id, $attributes);
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteArticle($id)
    {
        return $this->delete($id);
    }

    /**
     * @param array $attributes
     * @return bool
     */
    public function validate(array $attributes)
    {
        $validate = \Validator::make($attributes, $this->articleRule);
        if ($validate->passes()) {
            return true;
        }
        $this->setErrors($validate->messages());
        return false;
    }

    /**
     * Set error messages
     * @var \Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }
}