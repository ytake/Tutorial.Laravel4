<?php
// postメソッドすべてにcsrfフィルターを適用
\Route::when('*', 'csrf', ['post']);
/**
 * 'managed/article/*'パターンに該当するpostメソッドにpost.once(カスタムフィルター)を適用する
 * @see \App\Filters\PostOnceFilter
 */
\Route::when('managed/article/*', 'post.once', ['post']);

/*
|-------------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------------
*/
\Route::group(['namespace' => 'App\Controllers'], function () {
    // article API 許可されたIPのみアクセス可とする
    \Route::group(['namespace' => 'Api', 'prefix' => 'api/v1', 'before' => 'allow.access'], function () {
        //
        \Route::resource('article', 'ArticleController', ['only' => ['show', 'index', 'destroy']]);
        // ログインしていなければ実行させない
        \Route::group(['before' => 'auth'], function () {
            \Route::resource('article', 'ArticleController', ['only' => ['destroy']]);
        });
    });

    // managed page 管理画面
    \Route::group(['namespace' => 'Managed', 'prefix' => 'managed'], function () {
        // ログイン済みの場合はアクセスさせない
        \Route::group(['before' => 'auth.check'], function () {
            \Route::get('login', ['uses' => 'AuthenticateController@getLogin', 'as' => 'authenticate.login']);
            \Route::post('apply', ['uses' => 'AuthenticateController@postApply', 'as' => 'authenticate.apply']);
        });
        // auth filter適用コントローラーをグループで指定します
        // 認証が通っていない場合はアクセスする事ができません
        \Route::group(['before' => 'auth'], function () {
            // logout action
            \Route::get('logout', ['uses' => 'AuthenticateController@getLogout', 'as' => 'authenticate.logout']);
            \Route::controller('article', 'ArticleController', [
                    'getIndex' => 'managed.article.index',
                    'getShow' => 'managed.article.show',
                    'getForm' => 'managed.article.form',
                    'postConfirm' => 'managed.article.confirm',
                    'postApply' => 'managed.article.apply',
                ]);
            \Route::controller('inquiry', 'InquiryController', [
                    'getIndex' => 'managed.inquiry.index',
                    'getShow' => 'managed.inquiry.show',
                ]);

            \Route::controller('', 'HomeController', ['getIndex' => 'managed.home']);
        });
    });

    // inquiry page お問い合わせ画面
    \Route::group(['namespace' => 'Inquiry'], function () {
        
        \Route::controller('inquiry', 'InquiryController', [
                'getIndex' => 'inquiry.form',
                'getForm' => 'inquiry.form',
                'postConfirm' => 'inquiry.confirm',
                'postApply' => 'inquiry.apply',
            ]);

        \Route::controller('', 'HomeController', ['getIndex' => 'inquiry.index']);
    });
    //
    \Route::controller('/', 'HomeController', ['getIndex' => 'home.index']);
});
