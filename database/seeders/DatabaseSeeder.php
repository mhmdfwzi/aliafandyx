<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin::factory(3)->create();
        Category::factory(10)->create();
        Store::factory(5)->create();
        Vendor::factory(5)->create();
        Product::factory(50)->create();

        // $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(WebsitePartsSeeder::class);
        $this->call(DestinationSeeder::class);
        \App\Models\User::factory(4)->create();
    }
}
