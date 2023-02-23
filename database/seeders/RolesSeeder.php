<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }
        $user = User::where('email', 'admin@pt.com')->first();

        if($user && Role::where('name', 'admin')->exists() ){
            $user->assignRole('admin');
        }
    }
}
