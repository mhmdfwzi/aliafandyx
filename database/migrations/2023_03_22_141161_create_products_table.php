<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            // can't delete category that has products as a children
            $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
            $table->string('name');
            $table->foreignId('brand_id')->nullable()->constrained('brands','id')->nullOnDelete();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->float('price')->default(0); 
            $table->float('compare_price')->nullable();
            $table->unsignedSmallInteger('quantity')->default(0);
            // $table->json('options')->nullable();
            $table->boolean('featured')->default(0);
            // $table->enum('product_type',['normal','best_seller','new_arrival','top_rated','other'])->default('normal');
            $table->enum('status',['active','draft','archived'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
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
};
