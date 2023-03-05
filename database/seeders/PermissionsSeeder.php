<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissionsArr = ['students', 'schedules', 'users', 'instructors', 'roles', 'fees', 'road tests', 'pdf forms', 'student progress', 'subjects', 'courses'];
        $opArr = ['create', 'view', 'edit', 'delete'];
        $user = User::where('email', 'admin@pt.com')->first();
        foreach( $permissionsArr as $permission){
            foreach( $opArr as $operation){
                $conPermisson = $operation.' '.$permission;
                if(!Permission::where('name', $conPermisson)->exists()){
                    Permission::create(['name' => $conPermisson,'group' => $permission]);
                }
                //grant permission to user
                if($user){
                    $user->givePermissionTo($conPermisson);
                }
            }
        }
    }
}
