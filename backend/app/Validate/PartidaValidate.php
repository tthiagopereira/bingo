<?php


namespace App\Validate;


use Illuminate\Support\Facades\Validator;

class PartidaValidate
{
    public function partida($request)
    {
        $validate = Validator::make($request->all(), [
            'data' => 'required|date',
            'status' => 'required',
            'premiacao_id' => 'required|exists:App\Models\Premiacao,id'
        ]);
        return $validate;
    }
}
