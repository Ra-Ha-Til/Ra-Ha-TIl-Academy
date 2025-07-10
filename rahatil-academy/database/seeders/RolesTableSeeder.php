<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Assign admin role to first user
        $admin = User::first();
        if ($admin) {
            $admin->update(['role' => 'admin']);
        }

        // Assign teacher role to next 5 users
        User::where('id', '>', 1)->limit(5)->update(['role' => 'teacher']);

        // Assign parent role to next 5 users
        User::where('id', '>', 6)->limit(5)->update(['role' => 'parent']);

        // All remaining users get student role
        User::whereNull('role')->orWhere('role', '')->update(['role' => 'student']);
    }
}