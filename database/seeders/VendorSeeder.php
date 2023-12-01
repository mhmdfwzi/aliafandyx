<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorSeeder extends Seeder
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
            'name'=>'vendor',
            'email'=>'vendor@vendor.com',
            'password'=>Hash::make('password'),
            'phone'=>'01111111111',
            'store_id'=>1,
            
        ]);
    }
}
