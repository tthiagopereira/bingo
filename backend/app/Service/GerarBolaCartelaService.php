<?php


namespace App\Service;


use App\Models\Bola_cartela;

class GerarBolaCartelaService extends DaoService
{
    public function __construct()
    {
        $this->class = Bola_cartela::class;
    }


}
