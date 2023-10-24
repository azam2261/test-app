<?php 
namespace App\Repositories\Backend\Eloquent\User;

use App\Models\User;
use App\Repositories\Backend\Eloquent\Repository;
use App\Repositories\Backend\Eloquent\User\UserRepositoryInterface;


class UserRepository extends Repository implements  UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }
}
