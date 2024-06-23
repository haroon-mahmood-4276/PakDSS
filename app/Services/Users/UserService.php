<?php

namespace App\Services\Users;

use App\Models\Admin;
use App\Utils\Traits\ServiceShared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService implements UserInterface
{
    use ServiceShared;

    private function model()
    {
        return new Admin();
    }

    public function store($inputs)
    {
        return DB::transaction(function () use ($inputs) {
            $data = [
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'password' => Hash::make($inputs['password']),
                'email_verified_at' => now()->timestamp,
            ];

            $user = $this->model()->create($data);

            $user->roles()->sync($inputs['roles'] ?? []);

            return $user;
        });
    }

    public function update($id, $inputs)
    {
        return DB::transaction(function () use ($id, $inputs) {
            $user = $this->model()->find($id);

            $data = [
                'name' => $inputs['name'],
            ];

            if ($inputs['password']) {
                $data['password'] = Hash::make($inputs['password']);
            }

            $user->update($data);
            $user->roles()->sync($inputs['roles'] ?? []);

            return $user;
        });
    }

    public function destroy($inputs)
    {
        return DB::transaction(function () use ($inputs) {

            $users = $this->model()->whereIn('id', $inputs)->get()->each(function ($user) {
                $user->delete();
            });

            return $users;
        });
    }
}
