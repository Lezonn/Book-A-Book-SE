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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->string('author');
            $table->string('image')->nullable();
            $table->text('description');

            $table->integer('stock');
            $table->integer('pages');
            $table->string('publisher');
            $table->decimal('weight');
            $table->timestamp('publish_date');
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
        Schema::dropIfExists('books');
    }
};
