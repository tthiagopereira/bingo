<?php

namespace App\Http\Controllers;

use App\Service\GanhadorService;
use Illuminate\Http\Request;

class GanhadorController extends Controller
{
    protected $service;
    public function __construct(GanhadorService $ganhadorService)
    {
        $this->service = $ganhadorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json($this->service->retornaGanhadores($id));
    }

    public function linhaDupla($id)
    {
        return response()->json($this->service->retornaGanhadoresLinhaDupla($id));
    }

    public function ganhadorUser($id)
    {
        return response()->json($this->service->ganhadorUser($id));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
