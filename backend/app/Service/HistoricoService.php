<?php


namespace App\Service;

use Illuminate\Support\Facades\DB;

class HistoricoService extends DaoService
{

    public function historico()
    {
        $sql = 'select
	                pre.id as bingo,
                    pre.valor,
                    count(*) as quantidade,
                    sum(pre.valor) as total
                from cartelas ca
                join partidas pa on ca.partida_id = pa.id
                join premiacaos pre on pa.premiacao_id = pre.id
                group by partida_id;';


        $historico = DB::select($sql);

        return $historico;
    }
}
