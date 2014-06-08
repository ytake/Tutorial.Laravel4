<?php
namespace App\Filters;

/**
 * ユーザー独自のフィルターを実装
 * ログイン済みにアクセスを許可しない
 * Class PostOnceFilter
 * @package App\Filters
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AuthCheckFilter
{
    /**
     * filter 実装
     */
    public function filter()
    {
        if(\Auth::check()) {
            return \Redirect::to('managed/');
        }
    }
}