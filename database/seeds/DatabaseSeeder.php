<?php

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
    	factory(App\Category::class, 5)->create();
    	factory(App\Subcategory::class, 10)->create();
    	factory(App\Brand::class, 5)->create();
        factory(App\Item::class, 30)->create();
    }
}
