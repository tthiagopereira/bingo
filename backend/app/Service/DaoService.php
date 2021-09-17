<?php
namespace App\Service;

class DaoService
{
    protected $class;

    public function index()
    {
        return $this->class::all();
    }

    public function show($id)
    {
        $item = $this->class::find($id);
        if($item) { return $item; }
        return response()->json(['message' => 'Item não encontrado'],401);
    }

    public function create($request)
    {
        return $this->class::create($request->all());
    }

    public function edit($request, $id)
    {
        $item = $this->class::find($id);
        if(!$item) {
            return response()->json(['message' => 'Item não encontrado']);
        }
        $item->fill($request->all());
        $item->update();
        return $item;
    }

    public function destroy($id)
    {

        $item = $this->class::find($id);
        if($item) {
            $item->delete();
            return 'Item excluido com sucesso';
        }
        return 'Item não existe';
    }
}
