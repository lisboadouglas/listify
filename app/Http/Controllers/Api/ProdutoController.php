<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::where("lista_id", $request->lista_id)->get();
        return response()->json([
            "status" => "success",
            "message" => "Showing products in the list",
            "data" => $produtos
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //nothing to do
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => "min:3|max:250",
            'quantidade' => "min:1|numeric",
            "lista_id" => "exists:listas,id"
        ];
        $feedback = [
            'min' => 'The :attribute field must contain more than 3 characters',
            'max' => 'The :attribute fiel must contain less than 250 characteres',
            'numeric' => 'The :attribute field must contain just integer numbers',
            'exists' => 'The list ID sent does not exist'
        ];
        $request->validate($rules,$feedback);
        $productId = Produto::create($request->all())->id;
        return response()->json([
            "status" => "success",
            "message" => "Product created successfully",
            "data" => ['product_id' => $productId]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Showing product data',
            'data' => $produto
        ],200);
        
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
    public function update(Request $request, Produto $produto)
    {
        $rules = [
            'nome' => "min:3|max:250",
            'quantidade' => "min:1|numeric",
            "lista_id" => "exists:listas,id"
        ];
        $feedback = [
            'min' => 'The :attribute field must contain more than 3 characters',
            'max' => 'The :attribute fiel must contain less than 250 characteres',
            'numeric' => 'The :attribute field must contain just integer numbers',
            'exists' => 'The list ID sent does not exist'
        ];
        $request->validate($rules,$feedback);
        $produto->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "Product updated successfully",
            "data" => $produto
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ],200);
    }
}
