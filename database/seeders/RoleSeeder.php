<?php

namespace Database\Seeders;

use App\Models\Role;



class RoleSeeder extends SeederProvider
{
        public function run(): void
        {
            foreach($this->roles as $role) {
                $newRoles = new Role();
                $newRoles->label = $role["label"];
                $newRoles->save();
            }
        }
}