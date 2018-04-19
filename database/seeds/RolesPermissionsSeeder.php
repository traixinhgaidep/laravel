<?php

use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_permissions = [
            [
                'permission_id' => '1',
                'role_id' => '1',
            ],
            [
                'permission_id' => '2',
                'role_id' => '1',
            ],
            [
                'permission_id' => '3',
                'role_id' => '1',
            ],
            [
                'permission_id' => '4',
                'role_id' => '1',
            ],
            [
                'permission_id' => '5',
                'role_id' => '1',
            ],
            [
                'permission_id' => '6',
                'role_id' => '1',
            ],
            [
                'permission_id' => '7',
                'role_id' => '1',
            ],
            [
                'permission_id' => '8',
                'role_id' => '1',
            ],
            [
                'permission_id' => '9',
                'role_id' => '1',
            ],

        ];
        DB::table('roles_permissions')->delete();
        foreach ($roles_permissions as $roles_permission) {
            DB::table('roles_permissions')->insert($roles_permission);
        };
    }
}
