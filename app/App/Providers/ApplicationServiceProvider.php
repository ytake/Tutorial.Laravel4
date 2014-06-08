<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * アプリケーションの依存を解決するクラス
 * ここで依存を定義し、app.phpのproviders配列へ追記します
 *
 * Class ApplicationServiceProvider
 * @package App\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ApplicationServiceProvider Extends ServiceProvider
{

    public function register()
    {
        // UserRepository
        $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\Fluent\UserRepository');
        // ArticleRepository
        $this->app->bind('App\Repositories\ArticleRepositoryInterface', 'App\Repositories\Fluent\ArticleRepository');
    }
} 