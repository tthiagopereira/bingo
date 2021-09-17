<?php


namespace App\Service;


use App\Models\Cartela;
use App\Models\Premiacao;

class PremiacaoService extends DaoService
{
    public function __construct()
    {
        $this->class = Premiacao::class;
    }

    public function premiacaoUsers()
    {
        return Premiacao::with('users')->get();
    }

    public function receitaBruta()
    {
        $premiacao = Premiacao::find(1);
        $valor = $premiacao->valor;
        $cartelas = Cartela::all()->count();
        return $valor * $cartelas;
    }
}
