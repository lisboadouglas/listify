<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $listas = Lista::where('user_id', $request->user_id)->get();
        return response()->json([
            'status' => "success",
            'message' => "Showing all the lists createds for user",
            'data' => $listas
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Nothing to do
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'min:3|max:250',
            'user_id' => 'exists:users,id'
        ];
        $feedback = [
            'min' => 'The :attribute field must contain more than 3 characters',
            'max' => 'The :attribute fiel must contain less than 250 characteres',
            'exists' => 'The user ID sent does not exist'
        ];
        $request->validate($rules, $feedback);
        $listId = Lista::create($request->all())->id;
        return response()->json([
            'status' => 'success',
            'message' => 'List created successfully',
            'data' => ['list_id' => $listId]
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $listaId)
    {
        //$produtos = DB::table('listas')->join('produtos','listas.id', '=', "produtos.listas_id")->select('listas.id','listas.nome','produtos.id','produtos.nome','produtos.quantidade')->where('listas.user_id', $userId)->where("produtos.listas_id",$listaId)->get();
        $lista = Lista::where('id',$listaId)->first();
        $produtos = Produto::where('listas_id', $listaId)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Showing products in the list',
            'data' => [
                'list_id' => $listaId,
                'list_name' => $lista->nome,
                'products' => $produtos
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Nothing to do
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lista $lista)
    {
        $rules = [
            'nome' => 'min:3|max:250',
            'user_id' => 'exists:users,id'
        ];
        $feedback = [
            'min' => 'The :attribute field must contain more than 3 characters',
            'max' => 'The :attribute fiel must contain less than 250 characteres',
            'exists' => 'The user ID sent does not exist'
        ];
        $request->validate($rules, $feedback);
        $lista->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'List updated successfully',
            'data' => $lista
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
