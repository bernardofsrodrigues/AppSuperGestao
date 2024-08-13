<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) //get
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index', compact('produtos'), ['request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //get
    {
        echo 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //post
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto) //get
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto) //get
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto) //put
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto) //delete
    {
        //
    }
}
