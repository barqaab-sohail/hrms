<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\user;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = Role::create(['name' => 'User']);
        $manager= Role::create(['name' => 'Manager']);
        $HrAssistant = Role::create(['name' => 'HR Assistant']);
        $HrManager = Role::create(['name' => 'HR Manager']);
        $SuperAdmin = Role::create(['name' => 'Super Admin']);

    	$view = Permission::create(['name' => 'view personal record']);
        $edit = Permission::create(['name' => 'edit record']);

        $user->givePermissionTo($view);
        $manager->givePermissionTo($view);
        $HrAssistant->givePermissionTo($view);
        $HrManager->givePermissionTo($view);
        $SuperAdmin->givePermissionTo($view);

        $HrAssistant->givePermissionTo($edit);
        $HrManager->givePermissionTo($edit);
        $SuperAdmin->givePermissionTo($edit);

        $user = user::find(1);
        $user->assignRole('Super Admin');


    }
}
