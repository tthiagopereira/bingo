<?php


namespace App\Validate;


use Illuminate\Support\Facades\Validator;

class PremiacaoValidate
{
    public function premiacao($request)
    {
        $validate = Validator::make($request->all(), [
            'moeda' => 'required',
            'valor' => 'required',
            'percentual' => 'required',
            'linha' => 'required',
            'linha_percentual' => 'required',
            'linha_dupla' => 'required',
            'linha_dupla_percentual' => 'required',
            'bingo' => 'required',
            'bingo_percentual' => 'required',
            'user_id' => 'required',
        ]);
        return $validate;
    }
}
