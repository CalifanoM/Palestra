<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /*
         * $createplan = 'create plan';
        $createexercise = 'create exercise';
        $deleteexercise = 'delete exercise';
        $updateexercise = 'update exercise';
        $createcontain = 'create contain';
        $createuser = 'create user';
        $createmonitoraggio = 'create monitoraggio';
        */

        $manipolateEexercise='manipolate-exercise';
        $gestionemonitoraggio='gestione-monitoraggio';
        $gestionescheda='gestione-scheda';
        $changerole='manipolate-role';


        /*
         * Permission::create(['name' => $createplan]);
        Permission::create(['name' => $createexercise]);
        Permission::create(['name' => $deleteexercise]);
        Permission::create(['name' => $updateexercise]);
        Permission::create(['name' => $createcontain]);
        Permission::create(['name' => $createuser]);
        Permission::create(['name' => $createmonitoraggio]);
        */


        Permission::create(['name' => $manipolateEexercise]);
        Permission::create(['name'=>$gestionemonitoraggio]);
        Permission::create(['name'=>$gestionescheda]);

        /*$admin='admin';
        $personaltrainer='personal-trainer';
        $atleta='atleta';*/

        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

        Role::create(['name' => 'personaltrainer'])->givePermissionTo([
            $manipolateEexercise,
            $gestionemonitoraggio,
            $gestionescheda,
        ]);

        Role::create(['name' => 'atleta'])->givePermissionTo([
            $gestionemonitoraggio
        ]);

    }
}
