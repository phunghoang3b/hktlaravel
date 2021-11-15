<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate dùng để xóa hết dữ liệu trong tbl_roles khi phát hiện dữ mới, xóa cũ thêm mới
        Roles::truncate();

        Roles::create(['name'=>'admin']);
        Roles::create(['name'=>'user']);
        Roles::create(['name'=>'manager']);

    }
}
