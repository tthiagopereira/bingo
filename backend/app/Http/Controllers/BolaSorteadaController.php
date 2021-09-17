<?php

namespace App\Http\Controllers;

use App\Models\Bola_sorteada;
use App\Service\BolaSorteadaService;
use Illuminate\Http\Request;

class BolaSorteadaController extends Controller
{

    private $service;

    public function __construct(BolaSorteadaService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->service->create($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bola_sorteada  $bola_sorteada
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json($this->service->showJogoBolas($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bola_sorteada  $bola_sorteada
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        return response()->json($this->service->edit($request, id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bola_sorteada  $bola_sorteada
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return response()->json(['message' => $this->service->destroy($id)]);
    }

    public function statusBola($id)
    {
        return $this->service->statusBola($id);
    }
}
