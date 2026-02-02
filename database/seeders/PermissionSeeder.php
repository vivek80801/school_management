<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[Permission::class]->forgetCachedPermissions();

        $actions = ['create', 'read', 'update', 'delete'];
        $modules = [
            'user',
            'role',
        ];
        foreach ($modules as $module) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => $module.'.'.$action,
                    'guard_name' => 'web',
                ]);
            }
        }

        Log::info('Permissions are seeded successfully');
    }
}
