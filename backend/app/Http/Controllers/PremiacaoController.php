<?php

namespace App\Http\Controllers;

use App\Models\Premiacao;
use App\Service\PremiacaoService;
use App\Validate\PremiacaoValidate;
use Illuminate\Http\Request;

class PremiacaoController extends Controller
{
    protected $service;
    protected $validate;

    public function __construct(PremiacaoValidate $premiacaoValidate, PremiacaoService $premiacaoService)
    {
        $this->service = $premiacaoService;
        $this->validate= $premiacaoValidate;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(Request $request)
    {
        $validate = $this->validate->premiacao($request);
        if($validate->fails()) {
            return response()->json($validate->messages());
        }
        return $this->service->create($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate->premiacao($request);
        if($validate->fails()) {
            return response()->json($validate->messages());
        }
        return $this->service->edit($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function premiacaoUser()
    {
        return $this->service->premiacaoUsers();
    }

    public function valorreceita()
    {
        return response()->json(['valor' => $this->service->receitaBruta()]);
    }
}
