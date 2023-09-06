<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->longText('description');

            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on("categories")->onDelete('cascade');

            $table->text('file');
            $table->text('thumbnail');
            $table->float('rating');


            $table->unsignedBigInteger('serie_id')->unsigned();
            $table->foreign('serie_id')->references('id')->on("series")->onDelete('cascade');


            $table->dateTime('date');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
