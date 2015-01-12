<?php
namespace App\Controllers\Inquiry;

use App\Controllers\BaseController;

/**
 * Class HomeController
 * @package App\Controllers\Inquiry
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends BaseController
{
    public function getIndex()
    {
    	echo "Dddd";exit;
        return \View::make('inquiry.from');
    }
}
