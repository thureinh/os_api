<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Brand;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        //Category and Subcategory Seeder
        factory(Category::class, 10)->create()->each(function ($category) {
        	$subcategories = factory(Subcategory::class, 2)->make();
        	$category->subcategories()->saveMany($subcategories);
        });
        //Brand Seeder
        factory(Brand::class, 10)->create();
    }
}
