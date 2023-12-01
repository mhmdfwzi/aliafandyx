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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->unique();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('expiration_date');
            $table->smallInteger('usage_limit');
            $table->smallInteger('usage_count');
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreignId('store_id')->nullable()->constrained('stores')->nullOnDelete();
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
        Schema::dropIfExists('coupons');
    }
};
