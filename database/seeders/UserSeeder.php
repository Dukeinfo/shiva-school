<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin 1
        $admin = new User();
        $admin->name = 'Admin';
        $admin->role_id = 1;
        $admin->email = 'admin@gmail.com';
        $admin->email_verified_at = Carbon::now()->toDateTimeString();
        $admin->password = Hash::make('admin@123#');
        $admin->save();
    }
}

