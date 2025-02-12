<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // ID do comentário
            $table->foreignId('answer_id')->constrained()->onDelete('cascade'); // Relaciona com a resposta
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relaciona com o autor
            $table->text('content'); // Conteúdo do comentário
            $table->timestamps(); // Campos 'created_at' e 'updated_at'
        });
    }
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};