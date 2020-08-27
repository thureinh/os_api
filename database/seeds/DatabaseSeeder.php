<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Item::class, 3)->create();
    }
}
