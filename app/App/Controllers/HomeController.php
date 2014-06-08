<?php
namespace App\Controllers;

use App\Repositories\ArticleRepositoryInterface;

/**
 * Class HomeController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends BaseController
{
    /** @var \App\Repositories\ArticleRepositoryInterface */
    protected $article;

    /**
     * @param ArticleRepositoryInterface $article
     */
    public function __construct(ArticleRepositoryInterface $article)
    {
        $this->article = $article;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $articles = $this->article->getArticlePaginate(1);
        return \View::make('home.index')->with('list', $articles);
    }
}
