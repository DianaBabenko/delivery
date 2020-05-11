<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @param int $id
     * @return User|null|object
     */
    public function find(int $id): ?User
    {
        return User::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return User::all();
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        $newUser = new User();

        return $this->update($newUser, $data);
    }

    public function update(User $user, array $data): User
    {
        //
    }
}
