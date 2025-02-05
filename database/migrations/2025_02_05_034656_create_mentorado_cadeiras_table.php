<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*se precisa mostrar as cadeiras que um mentored está estudando, a tabela mentorado_cadeiras será usada
 para fazer essa ligação.
 Permite que um mentored possa cursar várias cadeiras e vice-versa.*/


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
            $table->foreignId('cadeira_id')->constrained('cadeiras')->onDelete('cascade');
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
