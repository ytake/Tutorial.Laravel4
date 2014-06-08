<?php
namespace App\Filters;

/**
 * ユーザー独自のフィルターを実装
 * 二重投稿阻止の実装
 * Class PostOnceFilter
 * @package App\Filters
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class PostOnceFilter extends AbstractFormFilter
{
    /**
     * このフィルターを使用する場合、
     * controllerを命名規則通りに実装する必要があります
     * このチュートリアルでは、登録画面:form, 確認画面:confirm, 実行:apply の命名規則で実装されています
     *
     */

    /**
     * filter 実装
     */
    public function filter()
    {
        list($controller, $method) = explode('@', \Route::currentRouteAction());
        $reflectionClass = new \ReflectionClass($controller);
        $constant = $reflectionClass->getConstant('SESSION_KEY');

        if(!\Session::get($constant)) {
            return \Redirect::route($this->redirectForm());
        }
    }
}