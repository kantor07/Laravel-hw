<?php
declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

final class UserQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = User::query();
    }

    public function getUser(): LengthAwarePaginator
    {
        return $this->model
            ->paginate(config('pagination.admin.users'));
    }

    public function create(array $data): User|bool
    {
        return User::create([
            'name'  => $data['name'],
            'email' =>  $data['email'],
            'password'  => Hash::make($data['password']),
            'is_admin' => $data['is_admin'],
        ]);
    }

    public function update(User $user, array $data): bool
    {  
       // dd($data);
        return $user->fill([
            'name'  => $data['name'],
            'email' =>  $data['email'],
            'password'  => Hash::make($data['password']),
            'is_admin' => $data['is_admin'],
        ])->save();
    }
}