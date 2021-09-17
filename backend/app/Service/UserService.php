<?php


namespace App\Service;

use App\Models\User;

class UserService extends DaoService
{
    public function __construct()
    {
        $this->class = User::class;
    }

    public function store($request)
    {
        $request['password'] = bcrypt($request['password']);
        return $this->create($request);
    }

    public function update($request, $id)
    {
        if($request['password'])
        {
            $request['password'] = bcrypt($request['password']);
        }
        return $this->edit($request, $id);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }

    public function quantidadeJogador()
    {
        return User::where('tipo', 'jogador')->count();
    }
}
