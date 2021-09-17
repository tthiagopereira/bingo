<?php

namespace App\Http\Controllers;

use App\Models\Cartela;
use App\Service\CartelaService;
use Illuminate\Http\Request;

class CartelaController extends Controller
{
    private $service ;

    public function __construct(CartelaService $service)
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
     * @return Cartela
     */
    public function store(Request $request)
    {
        return $this->service->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cartela  $cartela
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cartela  $cartela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->edit($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cartela  $cartela
     * @return string
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function quantidadecartela()
    {
        return $this->service->quantidadeCartela();
    }

    public function minhasCartelas($id)
    {
        return response()->json($this->service->minhasCartelas($id));
    }

    public function bolasSorteadas($id)
    {
        return response()->json($this->service->bolasSorteadas($id));
    }

    public function bingo()
    {
        return $this->service->obterBolasSorteadasCartelas();
    }
}
