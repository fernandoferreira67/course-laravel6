<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        /*Method Normal
        $stores = \App\Store::all();*/

        //Trazer dados paginados
        $stores = \App\Store::paginate(10);
        return view('admin.stores.index',compact('stores'));
    }

    public function create(){
        $users = \App\User::all(['id','name']);
        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request)
    {
        //Pegar dados do Request
        $data = $request->all();

        //Pegar Dados Do Usuário
        $user = \App\User::find($data['user']);

        //Ligação entre  1:1 User e Store
        $store = $user->store()->create($data);

        flash('Loja Criada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = \App\Store::find($store);

        return view ('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $store)
    {
        $data = $request->all(); //Metodo Mass Assign -> Desta Forma guarda os dados no post na variavel data em forma de array associativo

        $store = \App\Store::find($store);
        $store->update($data);

        flash('Loja Atualizada com Sucesso')->success();
        return redirect()->route('admin.stores.index');

    }

    public function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();

        flash('Loja Removida com Sucesso')->success();
        return redirect()->route('admin.stores.index');

    }
}
