<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'Lógica de Programação',
                'description' => 'Essa comunidade foca em conceitos básicos e avançados de lógica de programação.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Engenharia de Software',
                'description' => 'Aprenda sobre design, arquitetura e ciclo de vida do software.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Banco de Dados',
                'description' => 'Explore conceitos de modelagem e gerenciamento de dados.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Desenvolvimento Web',
                'description' => 'Aprenda sobre criação de sites e aplicações modernas.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Design',
                'description' => 'Descubra técnicas de {mudar isso dps}.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Redes de Computadores',
                'description' => 'Entenda como funcionam as redes e a segurança da informação.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
