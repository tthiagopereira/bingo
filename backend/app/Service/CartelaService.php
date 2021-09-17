<?php


namespace App\Service;

use App\Models\Bola_cartela;
use App\Models\Bola_sorteada;
use App\Models\Cartela;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartelaService extends DaoService
{
    private $gerarCartelaService;

    public function __construct(GeradorDeCartelaService $cartelaService)
    {
        $this->class = Cartela::class;
        $this->gerarCartelaService = $cartelaService;
    }

    public function create($request)
    {
        if(isset($request->quantidade)) {
            for($i = 0; $i < $request->quantidade; $i++) {
                $item = new Cartela();
                $item->partida_id = $request->partida_id;
                $item->user_id = $request->user_id;
                $item->save();
                $this->gerarCartelaService->gerar($item->id);
            }
        }else{
            $item = new Cartela();
            $item->partida_id = $request;
            $item->user_id = null;
            $item->save();
        }
        return $item;
    }

    public function quantidadeCartela()
    {
        return Cartela::where('user_id','<>', null)->count();
    }

    public function minhasCartelas($id)
    {

        $bolaSorteada = $this->obterBolasSorteadasCartelas();

        foreach ($bolaSorteada as $item)
        {
            $bolaCartelaUpdateStatus = Bola_cartela::where('cartela_id', $item->cartela)->where('bola', $item->bola)->first();
            if($bolaCartelaUpdateStatus)
            {
                $bolaCartelaUpdateStatus->status = false;
                $bolaCartelaUpdateStatus->update();
            }
        }

        return Cartela::with('bolaCartelas')
            ->where('user_id', $id)
            ->get();
    }

    public function obterBolasSorteadasCartelas()
    {
        $sql = 'select
                        bs.bola,
                        pa.id as partida,
                        ca.id as cartela
                from bola_sorteadas bs
                    join partidas pa on pa.id = bs.partida_id
                    join cartelas ca on ca.partida_id = pa.id
                    join bola_cartelas bc on bc.cartela_id = ca.id
                    where bs.status = false and
                    bs.bola = bc.bola;';
        $bolasCartelasSorteadas = DB::select($sql);
        return $bolasCartelasSorteadas;
    }

}
