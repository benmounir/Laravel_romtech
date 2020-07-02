<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('fournisseurs')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();

                $table->string('name');
                $table->string('slug')->nullable();
                $table->text('detail');
                $table->unsignedFloat('prix_vente');
                $table->unsignedFloat('prix_achat');
                $table->unsignedBigInteger('sub_category_id');
                $table->unsignedBigInteger('fournisseur_id');
                $table->string('image');

                $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
                $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');


                $table->softDeletes();
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
