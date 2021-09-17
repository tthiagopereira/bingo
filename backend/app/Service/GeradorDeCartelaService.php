<?php


namespace App\Service;


use App\Models\Bola_cartela;
use App\Models\Cartela;
use Illuminate\Database\Eloquent\Model;

class GeradorDeCartelaService extends DaoService
{
    public function __construct()
    {
        $this->class = Bola_cartela::class;
    }

    public function gerar($cartela_id){

        $bolaCartela = array();
        for($i = 0;$i < 15; $i++) {
            array_push($bolaCartela, $this->gerarNumero());
        }

        $bolas = array_unique($bolaCartela);
        $auxContador   = 0;
        $linhaContador = 1;
        if(count($bolas) === 15) {
            foreach($bolas as $bola) {
                $item = new Bola_cartela();
                $item->bola = $bola;
                $item->cartela_id = $cartela_id;
                $item->status = true;
                $item->linha = $linhaContador;
                $item->save();
                $auxContador++;
                if($auxContador === 5) {
                    $linhaContador+=1;
                    $auxContador=0;
                }
            }
            $linhaContador = 1;
        }else{
            $this->gerar($cartela_id);
        }
    }

    public function gerarNumero(){
        return mt_rand(1, 90);
    }

}
