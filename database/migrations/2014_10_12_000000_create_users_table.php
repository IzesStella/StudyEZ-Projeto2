<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*essa migration Armazena os dados dos usuários que usam o sistema (nome, e-mail, senha, etc.).
Exemplo de uso:
O usuário Maria faz login no sistema usando o e-mail e senha dela.
Esses dados são buscados na tabela users para verificar se estão corretos.
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID do usuário.
            $table->string('name'); // Nome do usuário
            $table->string('email')->unique(); // Email do usuário, deve ser único no banco de dados
            $table->timestamp('email_verified_at')->nullable(); // Data e hora em que o email foi verificado, pode ser nulo
            $table->string('password'); // Senha do usuário (armazenada de forma segura, geralmente com hash)
            $table->timestamps(); // Campos automáticos: 'created_at' (data de criação) e 'updated_at' (data de última atualização)

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
