<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\Produto;

class ApiController extends Controller
{
    //Clone Lists and Products
    public function cloneList($id){
        $lista = Lista::find($id);
        if(!empty($lista)){
            $newListaId = Lista::create([
                'nome' => $lista->nome." - Copy",
                'user_id' => $lista->user_id
            ])->id;
            $produtos = Produto::where('lista_id', $id)->get();
            foreach($produtos as $produto){
                Produto::create([
                    'nome' =>  $produto['nome'],
                    'quantidade' => $produto['quantidade'],
                    'lista_id' => $newListaId
                ]);
            }
            $showProds = Produto::where('lista_id', $newListaId)->get();
            $lista = Lista::find($newListaId);
            return response()->json([
                'status' => 'success',
                'message' => 'List cloned successfully',
                'data' => [
                    'id' => $lista->id,
                    'nome' => $lista->nome,
                    'produtos' => $showProds
                ]
            ], 200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'List not found'
            ], 404);
        }
        
    }

}
