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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shelf_id');
            $table->string('file');
            $table->string('title');
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->longText('abstract')->nullable();
            $table->longText('description')->nullable();
            $table->string('publisher')->nullable();
            $table->string('thumbnail')->nullable();
            $table->date('issued_at');
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
        Schema::dropIfExists('items');
    }
};
