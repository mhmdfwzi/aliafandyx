<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $destinations = [
            ['name' => 'مصر', 'parent_id' => null, 'rank' => '0', 'price' => null],
            ['name' => 'القلوبية', 'parent_id' => 1, 'rank' => '1', 'price' => null],
            ['name' => 'بنها', 'parent_id' => 2, 'rank' => '2', 'price' => null],
            ['name' => 'أتريب', 'parent_id' => 3, 'rank' => '3', 'price' => 20],
            ['name' => 'كفر الجزار', 'parent_id' => 3, 'rank' => '3', 'price' => 20],
        ];
            DB::table('destinations')->insert($destinations);

        
    }
}
