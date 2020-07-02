<?php

use App\Product;
use App\SubCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $subCategories = SubCategory::all();

        $subCategories->each(function($SubCategory , $key){
            factory(Product::class , 3)->create([
                
                'fournisseur_id' => 1,
                'sub_category_id'=> $SubCategory->id,
            ]);
        });
            
    
    }
}
