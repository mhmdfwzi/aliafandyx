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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // restrictOnDelete(Default) // if parent row has childeren rows it can't be deleted 
            // cascadeOnDelete // if parent row has childeren rows they will be deleted when it delete
            // nullOnDelete   // if parent row has childeren rows they will be null when it delete 
            $table->foreignId('parent_id')
            ->nullable()
            ->constrained('categories','id')
            ->nullOnDelete();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('featured')->default(0);
            $table->enum('status',['active','inactive'])->default('active');
            $table->integer('percent')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
