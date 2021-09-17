<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = [
            ['site'=> 'Bingo top'],
            ['site'=> 'Melhor do bingo'],
            ['site'=> 'Agora vai'],
        ];

        DB::table('sites')->insert($itens);
    }
}
