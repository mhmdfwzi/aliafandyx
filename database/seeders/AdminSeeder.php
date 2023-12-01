<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name'=>'Super Admin',
            'email'=>'super_admin@admin.com',
            'user_name'=>'admin',
            'password'=>Hash::make('password'),
            'phone_number'=>'01111111111',
            'super_admin'=>true
        ]);
    }
}
