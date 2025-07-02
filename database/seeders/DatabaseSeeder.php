<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed roles
        $roles = ['admin', 'seller', 'client'];
        foreach ($roles as $role) {
            if (!DB::table('roles')->where('name', $role)->exists()) {
                DB::table('roles')->insert(['name' => $role]);
            }
        }

        // Check if there is at least one admin user
        $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');
        $adminUser = DB::table('role_user')->where('role_id', $adminRoleId)->first();
        if (!$adminUser) {
            // Create the admin user
            $user = User::create([
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'address' => 'Admin Address',
                'created_at' => now(),
            ]);
            // Assign admin role
            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => $adminRoleId,
            ]);
            echo "Admin user created successfully! Please update the initial password!\n";
            echo "Email: admin@admin.com\n";
            echo "Initial password: admin123\n";
        }
    }
} 