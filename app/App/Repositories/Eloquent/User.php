<?php
namespace App\Repositories\Eloquent;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class User
 * @package App\Repositories\Eloquent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class User extends \Eloquent implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    /**
     * 使用するテーブルを指定します
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string
     * デフォルトではprimary_keyがidと想定されていますが、
     * このアプリケーションではtable名_idのため変更します
     */
    protected $primaryKey = 'user_id';

    protected $hidden = array('password', 'remember_token');

}