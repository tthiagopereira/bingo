<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use App\Validate\UserValidate;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $service;
    protected $validate;

    public function __construct(UserService $userService, UserValidate $userValidate)
    {
        $this->service = $userService;
        $this->validate = $userValidate;
    }

    public function index()
    {
        return response()->json($this->service->index());
    }

    public function store(Request $request)
    {
        $validate = $this->validate->validarUser($request);
        if($validate->fails()) {
            return response()->json($validate->messages());
        }

        return $this->service->store($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate->validateUserUpdate($request);
        if($validate->fails()) {
            return response()->json($validate->messages());
        }
        return response()->json($this->service->update($request,$id));
    }

    public function destroy($id)
    {
        return response()->json(['message'=>$this->service->delete($id)]);
    }

    public function quantidadeJogador()
    {
        return $this->service->quantidadeJogador();
    }
}
