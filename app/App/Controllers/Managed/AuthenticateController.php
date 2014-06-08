<?php
namespace App\Controllers\Managed;

use App\Controllers\BaseController;

/**
 * Class AuthenticateController
 * @package App\Controllers\Managed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>/
 */
class AuthenticateController extends BaseController
{

    public function getLogin()
    {
        return \View::make('managed.authenticate.login');
    }

    public function postApply()
    {
        $params = [
            'user_name' => \Input::get('user_name'),
            'password' => \Input::get('password')
        ];
        if(!\Auth::attempt($params))
        {
            return \Redirect::route('authenticate.login')
                ->withErrors(['message' => trans('authenticate.failed')]);
        }
        return \Redirect::to('managed/');
    }

    public function getLogout()
    {
        \Auth::logout();
        return \Redirect::to('/');
    }
} 