<?php
namespace App\Controllers\Managed;

use App\Controllers\BaseController;

/**
 * Class HomeController
 * @package App\Controllers\Managed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends BaseController
{
    public function getIndex()
    {
        return \View::make('managed.home');
    }
}
