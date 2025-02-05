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
        Schema::create('mentorad_cadeiras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentorado_id')->constrained('mentorado')->onDelete('cascade');
            $table->foreignId('cadeira')->constrained('cadeira')->onDelete('cascade');
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
        Schema::dropIfExists('mentorad_cadeiras');
    }
};
