<?php
namespace App\Repositories\Fluent;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Auth\UserInterface;

/**
 * Class UserRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class UserRepository extends AbstractFluent implements UserRepositoryInterface
{

    protected $cacheKey = "user:";
    /** @var string */
    protected $table = 'users';
    /** @var  */
    protected $primary = 'user_id';

    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->find($id);
    }

    /**
     * @param $userName
     * @return mixed|static
     */
    public function getUserFromName($userName)
    {
        return $this->getConnection()->where('user_name', $userName)->first();
    }
}