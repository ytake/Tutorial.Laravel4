<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Repositories\ArticleRepositoryInterface;

/**
 * Class ArticleController
 * @package App\Controllers\Api
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ArticleController extends BaseController
{
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return \Response::json($this->article->getArticleAll());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        return \Response::json($this->article->getArticle($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id = null)
    {
        if(is_null($id)) {
            return \Response::json(['error' => 'required id'], 403);
        }
        //
        $this->article->deleteArticle($id);
        return \Response::json([], 200);
    }


}
