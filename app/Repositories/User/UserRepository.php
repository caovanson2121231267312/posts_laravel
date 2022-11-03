<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\EloquentRepository;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getAllWithRoles(int $paginateNumber, $orderBy = 'id', $order = 'desc')
    {
        return $this->model->with("roles")->orderBy($orderBy, $order)->paginate($paginateNumber)->withQueryString();
    }

    public function findWithRelation(int $id, array $relations)
    {
        return $this->model->findOrFail($id)->load($relations);
    }

    public function updateUser($id,$attributes,array $roleIds)
    {
        $user = $this->update($id, $attributes);
        $user->syncRoles($roleIds);

        return $user;
    }

}