<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // User::create([
        //     'name'=>'kareem shaban',
        //     'email'=>'kareemshaban120@gmail.com',
        //     'password'=>Hash::make('password'),
        //     'type'=>'super-admin'
        // ]);

        // // timestamp inserted with null
        // DB::table('users')->insert([
        //     'name'=>'Admin ',
        //     'email'=>'Admin120@gmail.com',
        //     'password'=>Hash::make('password'),
        // ]);
    }
}
