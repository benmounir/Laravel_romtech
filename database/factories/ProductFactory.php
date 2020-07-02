<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' =>$faker->words(2),
        'detail' => $faker->paragraph,
        'prix_vente' => $faker->randomFloat($min = 5, $max = 100),
        'prix_achat' => $faker->randomFloat($min =5, $max=100),
        'image' => 'uploads/products/1591572216book7.png',
        'fournisseur_id' => 1
    ];
    /* $table->string('name');
            $table->string('slug');
            $table->text('detail');
            $table->double('prix_vente');
            $table->integer('SubCategory_id');
            $table->integer('fornisseur_id');
            $table->string('image');

            $table->softDeletes();
            $table->timestamps();*/
});
