<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
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
                'name' => 'admin',
                'email'=>'admin@admin.com',
                'password' =>bcrypt('123123'),
                'tipo'=>'administrador',
                'status' => true,
                'site_id' => 1
            ],
            [
                'name' => 'THIAGO',
                'email'=>'tthiagopereira7@gmail.com',
                'password' =>bcrypt('123123'),
                'tipo'=>'jogador',
                'status' => true,
                'site_id' => 1
            ],
        ];

        DB::table('users')->insert($itens);
    }
}
