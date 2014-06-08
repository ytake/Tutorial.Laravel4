<?php
namespace App\Repositories;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id);

    /**
     * @param $userName
     * @return mixed
     */
    public function getUserFromName($userName);
}