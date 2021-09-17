<?php

namespace App\Http\Controllers;

use App\Service\PartidaService;
use App\Validate\PartidaValidate;
use Illuminate\Http\Request;

class PartidaController extends Controller
{

    private $service;
    private $validate;

    public function __construct(PartidaService $partidaService, PartidaValidate $partidaValidate)
    {
        $this->service = $partidaService;
        $this->validate = $partidaValidate;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(Request $request)
    {
        $validate = $this->validate->partida($request);
        if($validate->fails()) {
            return response()->json($validate->messages());
        }
        return $this->service->createPartidaCartela($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate->partida($request);
        if($validate->fails()) {
            return response()->json($validate->messages());
        }
        return $this->service->edit($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function premiacaoPartida()
    {
        return $this->service->premiacaoPartida();
    }
}
