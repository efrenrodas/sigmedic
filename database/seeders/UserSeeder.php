<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'administrar']);
       

        // create roles and assign created permissions

        // // this can be done as separate statements
        // $role = Role::create(['name' => 'administrador']);
        // $role->givePermissionTo('administrar');

        // // or may be done by chaining
        // $role = Role::create(['name' => 'desarrollador'])
        //     ->givePermissionTo('administrar');

        $role = Role::create(['name' => 'desarrollador']);
        $role->givePermissionTo(Permission::all());
        //crear usuarios
    //    $user= DB::table('users')->insert([
    //         'name'=>'admin',
    //         'email'=>'admin@mail.com',
    //         'password'=>Hash::make('password'),
    //     ]);
        $user = \App\Models\User::factory()->create([
            'name'=>'admin',
            'apellidos'=>'admin',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
            'email'=>'admin@mail.com',
            'password'=>Hash::make('password'),
        ]);
        $user->assignRole('administrador');
    }
}
