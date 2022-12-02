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
        Schema::create('oeuvres', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('media_url', 150);
            $table->string('thumbnail_url', 150);
            $table->text('description');
            $table->dateTime('date_creation');
            $table->unsignedInteger('coord_x')->default(0);
            $table->unsignedInteger('coord_y')->default(0);
            $table->unsignedBigInteger('salle_id');
            $table->unsignedBigInteger('auteur_id');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
            $table->foreign('auteur_id')->references('id')->on('auteurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oeuvres');
    }
};
