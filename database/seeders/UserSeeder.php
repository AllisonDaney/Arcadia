<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends SeederProvider
{
    public function run(): void
    {
        foreach($this->users as $user) {
            $role = Role::where('label', $user['role'])->first();

            $newUser = new User();
            $newUser->role_id = $role->id;
            $newUser->username = $user["username"];
            $newUser->password = Hash::make($user["password"]);
            $newUser->firstname = $user["firstname"];
            $newUser->lastname = $user["lastname"];
            $newUser->save();
        }
    }
}