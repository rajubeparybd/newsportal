<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createPermission();

        $roles = json_decode(file_get_contents(database_path("json/user/roles.json")), true);
        foreach ($roles as $item) {
            $role = Role::create([
                "name" => $item["name"],
                "description" => $item["description"],
            ]);

            if ($item["permissions"] == "all") {
                $permissions = Permission::all()->pluck("id")->toArray();
                $role->givePermissionTo($permissions);
            } else {
                $role->givePermissionTo($item["permissions"]);
            }
        }
    }

    private function createPermission(): void
    {
        $permissions = json_decode(file_get_contents(database_path("json/user/permissions.json")), true);
        foreach ($permissions as $permission) {
            Permission::create([
                "name" => $permission["name"],
                "description" => $permission["description"],
            ]);
        }
    }

}
