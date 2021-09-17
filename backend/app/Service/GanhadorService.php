<?php


namespace App\Service;


use App\Models\Bola_cartela;
use App\Models\Bola_sorteada;
use App\Models\Cartela;
use Illuminate\Support\Facades\DB;

class GanhadorService extends DaoService
{
    public function retornaGanhadores($partida)
    {
        $sql = "select
            bc.cartela_id,
            bc.linha,
            count(*) as quantidade,
            us.name,
            us.email,
            ca.partida_id as partida
        from bola_cartelas bc
            join cartelas ca on ca.id = bc.cartela_id
            join users us on us.id = ca.user_id
        where bc.status = false and ca.partida_id = ". $partida ." group by bc.cartela_id, bc.linha having quantidade = 5 order by bc.cartela_id;";

        $itens = DB::select($sql);
        $validaGanhador = [];

        foreach ($itens as $item) {
            array_push($validaGanhador, $item->cartela_id);
        }

        $unArray = array_unique( array_diff_assoc( $validaGanhador, array_unique( $validaGanhador ) ) );

        $cartela = [];
        if($unArray) {
            foreach ($unArray as $cartelas)
            {
                foreach ($itens as $item) {
                    if($item->cartela_id != $cartelas)
                    {
                        array_push($cartela, $item);
                    }
                }
            }
            return $cartela;
        }else{
            return $itens;
        }
    }

    public function retornaGanhadoresLinhaDupla($partida)
    {
        $sql = "select
            bc.cartela_id,
            bc.linha,
            count(*) as quantidade,
            us.name,
            us.email,
            ca.partida_id as partida
        from bola_cartelas bc
            join cartelas ca on ca.id = bc.cartela_id
            join users us on us.id = ca.user_id
        where bc.status = false and ca.partida_id = ". $partida ." group by bc.cartela_id, bc.linha having quantidade = 5 order by bc.cartela_id;";

        $itens = DB::select($sql);
        $validaGanhador = [];

        foreach ($itens as $item) {
            array_push($validaGanhador, $item->cartela_id);
        }

        $unArray = array_unique( array_diff_assoc( $validaGanhador, array_unique( $validaGanhador ) ) );
        $cartela = [];
        foreach ($unArray as $cartelas)
        {
            foreach ($itens as $item) {
                if($item->cartela_id === $cartelas)
                {
                    array_push($cartela, $item);
                }
            }
        }

        return $cartela;
    }

    public function ganhadorUser($id)
    {
//        $sql = "select
//                bc.cartela_id,
//                bc.linha,
//                count(*) as quantidade,
//                us.id as user_id,
//                us.name,
//                us.email,
//                ca.partida_id as partida
//            from bola_cartelas bc
//                join cartelas ca on ca.id = bc.cartela_id
//                join users us on us.id = ca.user_id
//                    where bc.status = false
//                    and ca.partida_id = 1
//                    and user_id = ".$id."
//            group by bc.cartela_id, bc.linha
//            having quantidade = 5;";
        $sql = "select
                    bc.cartela_id,
                    bc.linha,
                    count(*) as quantidade,
                    us.id as user_id,
                    us.name,
                    us.email,
                    ca.partida_id as partida,
                    pa.premiacao_id as premiacao,
                    p.moeda,
                    p.valor,
                    p.linha,
                    p.linha_dupla
                from bola_cartelas bc
                    join cartelas ca on ca.id = bc.cartela_id
                    join users us on us.id = ca.user_id
                    join partidas pa on pa.id = ca.partida_id
                    join premiacaos p on p.id = pa.premiacao_id
                        where bc.status = false
                        and ca.partida_id = 1
                        and us.id = ".$id."
                group by bc.cartela_id, bc.linha
                having quantidade = 5;";

        $itens = DB::select($sql);
        return $itens;
    }
}
