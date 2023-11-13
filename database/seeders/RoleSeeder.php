<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1 = Role::create(["name"=> "Admin"]);
        $role2 =Role::create(["name"=> "Vendedor"]);

        Permission::create(["name"=> "admin.home"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=> "admin.categories.index"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.categories.create"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.categories.edit"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.categories.destroy"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=> "admin.measures.index"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.measures.create"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.measures.edit"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.measures.destroy"])->syncRoles([$role1,$role2]);
    }
}
