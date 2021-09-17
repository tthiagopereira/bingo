<?php


namespace App\Validate;


use Illuminate\Support\Facades\Validator;

class UserValidate
{
    public function validarUser($request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'unique:users|required',
            'password' => 'required',
            'tipo' => 'required',
            'site_id' => 'required'
        ]);
        return $validate;
    }

    public function validateUserUpdate($request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'tipo' => 'required'
        ]);
        return $validate;
    }

    public function login($request) {
        $validate = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required'
        ]);
        return $validate;
    }
}
