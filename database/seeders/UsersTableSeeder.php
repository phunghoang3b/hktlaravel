<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $userRoles = Roles::where('name','user')->first();
        $managerRoles = Roles::where('name','manager')->first();

        $admin = Admin::create([
            'admin_name' => 'khaiadmin',
            'admin_email' => 'khai492@outlook.com',
            'admin_phone' => '0123456789',
            'admin_password' => md5('123456')
        ]);
        $user = Admin::create([
            'admin_name' => 'khaiuser',
            'admin_email' => 'khai492@outlook.com',
            'admin_phone' => '0123456789',
            'admin_password' => md5('123456')
        ]);
        $manager = Admin::create([
            'admin_name' => 'khaimanager',
            'admin_email' => 'khai492@outlook.com',
            'admin_phone' => '0123456789',
            'admin_password' => md5('123456')
        ]);

        // attach nhiều để lấy models quyền tương tác với table quyền.
        $admin->roles()->attach($adminRoles);
        $user->roles()->attach($userRoles);
        $manager->roles()->attach($managerRoles);
    }
}
