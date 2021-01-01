<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->truncate();
        DB::table('admin')->insert([
            'admin_name' => 'Admin',
            'admin_email' => 'admin@email.com',
            'admin_password' => Hash::make('123456'),
            'admin_address' => 'World street tour 1',
            'admin_photo' => '',
            'admin_description' => 'Manage All Feature / Menu',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
