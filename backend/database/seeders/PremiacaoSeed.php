<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PremiacaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = [
            [
                "moeda"=> "BRL",
                "valor"=> 2.5,
                "percentual"=> "2",
                "linha"=> 1,
                "linha_percentual"=> 1,
                "linha_dupla"=> 0,
                "linha_dupla_percentual"=> 1,
                "bingo_percentual"=> 1,
                "user_id"=> 1,]
        ];
        DB::table('premiacaos')->insert($itens);
    }
}
