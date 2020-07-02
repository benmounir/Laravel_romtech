<?php

use App\Category;
use App\SubCategory;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 5)->create();

        $categories->each(function($catgory){
            factory(SubCategory::class, 3)->create([
                'category_id'  => $catgory->id ,
            ]);
        });
    }
}
