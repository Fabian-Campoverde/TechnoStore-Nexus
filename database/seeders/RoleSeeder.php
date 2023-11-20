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
        $role3= Role::create(["name"=> "Almacenero"]);

        Permission::create(["name"=> "admin.home",
        "description"=>"Ver Dashboard"])->syncRoles([$role1,$role2,$role3]);

        Permission::create(["name"=> "admin.categories.index",
        "description"=>"Ver Categorias"])->syncRoles([$role1,$role2,$role3]);
        Permission::create(["name"=> "admin.categories.create",
        "description"=>"Crear categorias"])->syncRoles([$role1,$role2,$role3]);
        Permission::create(["name"=> "admin.categories.edit",
        "description"=>"Editar categorias"])->syncRoles([$role1,$role2,$role3]);
        Permission::create(["name"=> "admin.categories.destroy",
        "description"=>"Eliminar categorias"])->syncRoles([$role1,$role2,$role3]);

        Permission::create(["name"=> "admin.users.index",
        "description"=>"Ver usuarios"])->syncRoles([$role1]);
        Permission::create(["name"=> "admin.users.create",
        "description"=>"Crear usuarios"])->syncRoles([$role1]);
        Permission::create(["name"=> "admin.users.edit",
        "description"=>"Editar usuarios"])->syncRoles([$role1]);
        Permission::create(["name"=> "admin.users.destroy",
        "description"=>"Eliminar usuarios"])->syncRoles([$role1]);


        Permission::create(["name"=> "admin.roles.index",
        "description"=>"Ver roles"])->syncRoles([$role1]);
        Permission::create(["name"=> "admin.roles.create",
        "description"=>"Crear roles"])->syncRoles([$role1]);
        Permission::create(["name"=> "admin.roles.edit",
        "description"=>"Editar roles"])->syncRoles([$role1]);
        Permission::create(["name"=> "admin.roles.destroy",
        "description"=>"Eliminar roles"])->syncRoles([$role1]);

        Permission::create(["name"=> "admin.measures.index",
        "description"=>"Ver medidas"])->syncRoles([$role1,$role3]);
        Permission::create(["name"=> "admin.measures.create",
        "description"=>"Crear medidas"])->syncRoles([$role1,$role3]);
        Permission::create(["name"=> "admin.measures.edit",
        "description"=>"Editar medidas"])->syncRoles([$role1,$role3]);
        Permission::create(["name"=> "admin.measures.destroy",
        "description"=>"Eliminar medidas"])->syncRoles([$role1,$role3]);

        Permission::create(["name"=> "admin.products.index",
        "description"=>"Ver productos"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.products.create",
        "description"=>"Crear productos"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.products.edit",
        "description"=>"Editar productos"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.products.destroy",
        "description"=>"Eliminar productos"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=> "admin.providers.index",
        "description"=>"Ver proveedores"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.providers.create",
        "description"=>"Crear proveedores"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.providers.edit",
        "description"=>"Editar proveedores"])->syncRoles([$role1,$role2]);
        Permission::create(["name"=> "admin.providers.destroy",
        "description"=>"Eliminar proveedores"])->syncRoles([$role1,$role2]);
    }
}
