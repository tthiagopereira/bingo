<?php


namespace App\Service;


use App\Models\Bola_cartela;
use App\Models\Bola_sorteada;
use App\Models\Cartela;

class BolaSorteadaService extends DaoService
{
    public function __construct()
    {
        $this->class = Bola_sorteada::class;
    }

    public function gerarBingo($partida_id)
    {
        for ($i=1;$i<=90;$i++) {
            $item = new Bola_sorteada();
            $item->bola = $i;
            $item->status = true;
            $item->partida_id = $partida_id;
            $item->save();
        }
    }

    public function showJogoBolas($id)
    {
        $itens = Bola_sorteada::where('partida_id', $id)->get();
        return $itens;
    }

    public function statusBola($id)
    {
        $item = Bola_sorteada::find($id);
        $item->status = false;
        $item->update();
        return $item->bola;
    }
}
