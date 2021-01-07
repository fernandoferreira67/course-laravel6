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

        return $store;
    }
}
