<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_exist = User::where('email','admin@pt.com')->exists();
        if ($admin_exist != 1) {
        	User::create([
        		'first_name' => 'Admin',
        		'username' => 'admin',
        		'email' => 'admin@pt.com',
        		'password' => Hash::make('secret'),
        		'plain_password' => 'secret'
        	]);
            
        }
    }
}
