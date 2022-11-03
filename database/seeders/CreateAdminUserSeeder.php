<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $role = Role::create(['name' => 'Super-Admin']);
    
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    
        // $role = Role::create(['name' => ["Articles"]);
    
        // $permissions = Permission::pluck('id','id')->all();
   
        // $role->syncPermissions($permissions);
     
        // $user->assignRole([$role->id]);
    
    }
}
