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
        Schema::create('stores', function (Blueprint $table) {
            // id BIGINT UNSIGNED Auto Increment Primary key
            // $table->bigInteger('id')->unsigned()->autoIncrement()->primary();
            // $table->unsignedBigInteger('id)->autoIncrement()->primary();
            // $table->bigIncrements('id);
            $table->id();
            
            // VARCHAR(64000)
            // $table->string('column_name', column_size (Default 255));
            $table->string('name');

            $table->string('slug')->unique();

            // $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();

            // text(64000)
            // $table->text('column_name');
            $table->text('description')->nullable();

            $table->string('logo_image')->nullable();

            $table->string('cover_image')->nullable();

            $table->enum('status',['active','inactive'])->default('active');
            $table->integer('percent')->nullable();
            $table->string('phone_number')->nullable();
            $table->foreignId('governorate')->nullable()->constrained('destinations', 'id')->nullOnDelete();
            $table->foreignId('city')->nullable()->constrained('destinations', 'id')->nullOnDelete();
            $table->foreignId('neighborhood')->nullable()->constrained('destinations', 'id')->nullOnDelete();
            $table->string('street_address')->nullable();

            $table->softDeletes();

            
            
            // 2 columns: created_at updated_at (timestamps)  
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
        Schema::dropIfExists('stores');
    }
};
