<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): array
    {
        return User::all()->toArray();
    }

    public function getById(int $id): ?UserEntity
    {
        $user = User::find($id);
        if (!$user) return null;
        
        return new UserEntity($user->id, $user->name, $user->email, $user->password);
    }

    public function create(UserEntity $user): UserEntity
    {
        $model = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt($user->password),
        ]);

        return new UserEntity($model->id, $model->name, $model->email, $model->password);
    }

    public function update(UserEntity $user): UserEntity
    {
        $model = User::findOrFail($user->id);
        $model->update([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt($user->password),
        ]);

        return new UserEntity($model->id, $model->name, $model->email, $model->password);
    }

    public function delete(int $id): bool
    {
        return User::destroy($id) > 0;
    }
}
