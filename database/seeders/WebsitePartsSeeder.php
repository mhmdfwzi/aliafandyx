<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class WebsitePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('website_parts')->delete();

        $data = [
            ['key' => 'Slider', 'value' => '1','image'=>''],
            ['key' => 'Featured Categories Section', 'value' => '1','image'=>''],
            ['key' => 'Trending Product Section', 'value' => '1','image'=>''],
            ['key' => 'Banner Section', 'value' => '1','image'=>''],
            ['key' => 'Special Offers Section', 'value' => '1','image'=>''],
            ['key' => 'Home Product List Section', 'value' => '1','image'=>''],
            ['key' => 'Brands Section', 'value' => '1','image'=>''],
            ['key' => 'Blog Section', 'value' => '0','image'=>''],
            ['key' => 'Shipping Info Section', 'value' => '1','image'=>''],
            ['key' => 'Best Sellers', 'value' => '1','image'=>''],
            ['key' => 'New Arrivals', 'value' => '1','image'=>''],
            ['key' => 'Top Rated', 'value' => '1','image'=>''],
        ];

        DB::table('website_parts')->insert($data);
    }
}
