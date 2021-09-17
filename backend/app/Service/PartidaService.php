<?php


namespace App\Service;


use App\Models\Partida;
use App\Models\Premiacao;
use Illuminate\Http\Request;

class PartidaService extends DaoService
{
    private $cartelaService;
    private $bolaSorteada;

    public function __construct(CartelaService $service, BolaSorteadaService $bolaSorteada)
    {
        $this->class = Partida::class;
        $this->cartelaService = $service;
        $this->bolaSorteada = $bolaSorteada;
    }

    public function createPartidaCartela(Request $request)
    {
        $item =  $this->create($request);
        $this->bolaSorteada->gerarBingo($item->id);
        return $item;
    }

    public function premiacaoPartida()
    {
        return Premiacao::with('partidas')->get();
    }
}
