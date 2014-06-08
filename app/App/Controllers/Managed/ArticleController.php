<?php
namespace App\Controllers\Managed;

use App\Controllers\BaseController;
use App\Repositories\ArticleRepositoryInterface;

/**
 * Class ArticleController
 * @package App\Controllers\Managed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ArticleController extends BaseController
{
    // constants
    const PER_PAGE = 10;

    const SESSION_KEY = 'add_article';

    /** @var ArticleRepositoryInterface */
    protected $article;

    /**
     * @param ArticleRepositoryInterface $article
     */
    public function __construct(ArticleRepositoryInterface $article)
    {
        $this->article = $article;
    }

    /**
     * index / paginate
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $result = $this->article->getArticlePaginate(self::PER_PAGE);
        return \View::make('managed.article.index')->with('list', $result);
    }

    /**
     * @param null $one
     * @return \Illuminate\View\View
     */
    public function getForm($one = null)
    {
        \Session::put(self::SESSION_KEY, \Session::token());

        $result = $this->article->getArticle($one);
        return \View::make('managed.article.form')
            ->with('article', $result)->with('id', $one);
    }

    /**
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postConfirm($one = null)
    {
        $input = \Input::only(['article_title', 'article_body']);

        if(!$this->article->validate($input)) {
            return \Redirect::route('managed.article.form')
                ->withErrors($this->article->getErrors())->withInput();
        }
        return \View::make('managed.article.confirm')
            ->with('hidden', $this->setHiddenVars($input))->with('id', $one);
    }

    /**
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postApply($one = null)
    {
        if(\Input::get('_return')) {
            return \Redirect::route('managed.article.form', ['id' => $one])->withInput();
        }
        $input = \Input::only(['article_title', 'article_body']);
        $input['user_id'] = \Auth::getUser()->user_id;

        if(is_null($one)) {
            $this->article->addArticle($input);
        }else{
            $this->article->updateArticle($one, $input);
        }
        // session remove
        \Session::forget(self::SESSION_KEY);
        return \View::make('managed.article.apply');
    }

    /**
     * @param null $one
     * @return \Illuminate\View\View
     */
    public function getShow($one)
    {
        $result = $this->article->getArticle($one);
        return \View::make('managed.article.show')->with('article', $result);
    }

    /**
     * @access private
     * @param array $array
     * @return array
     */
    private function setHiddenVars(array $array)
    {
        $attributes = [];
        foreach($array as $key => $value) {
            $attributes[] = \Form::hidden($key, $value);
        }
        return implode("\n", $attributes);
    }

}