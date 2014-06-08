<?php
namespace App\Authenticate;

/**
 * Class GenericUser
 * @package App\Authenticate
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class GenericUser extends \Illuminate\Auth\GenericUser
{
    /**
     * @return mixed
     */
    public function getAuthIdentifier()
	{
		return $this->attributes['user_id'];
	}
}
