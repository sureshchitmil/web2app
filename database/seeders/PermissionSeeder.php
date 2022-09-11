<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $permissions = [
            'create_pages',
            'read_pages',
            'update_pages',
            'delete_pages',
            'create_tabs',
            'read_tabs',
            'update_tabs',
            'delete_tabs',
            'create_user_agent',
            'read_user_agent',
            'update_user_agent',
            'delete_user_agent',
            'create_floating_button',
            'read_floating_button',
            'update_floating_button',
            'delete_floating_button',
            'create_walkthrough',
            'read_walkthrough',
            'update_walkthrough',
            'delete_walkthrough',
            'create_users',
            'read_users',
            'update_users',
            'delete_users',
            'create_right_header_icon',
            'read_right_header_icon',
            'update_right_header_icon',
            'delete_right_header_icon',
            'create_menu',
            'read_menu',
            'update_menu',
            'delete_menu',
            'create_left_header_icon',
            'read_left_header_icon',
            'update_left_header_icon',
            'delete_left_header_icon',
            'create_app_settings',
            'read_app_settings',
            'update_app_settings',
            'delete_app_settings',
            'create_user',
            'read_user',
            'update_user',
            'delete_user',
            'manage_roles'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
