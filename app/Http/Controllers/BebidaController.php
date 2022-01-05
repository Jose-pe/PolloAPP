<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bebidas = Bebida::all();
        return view('bebidas-admin.index', compact('bebidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bebidas-admin.create');
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
        $input= $request->all();
        $bebida= Bebida::create($input);

        return redirect()->route('bebida.index')->with('status','Se ha creado una nueba bebida');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function show(Bebida $bebida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bebida = Bebida::find($id);
        return view('bebidas-admin.edit', compact('bebida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $bebida = Bebida::find($id);
        $bebida->update($input);
        return redirect()->route('bebida.index')->with('status','Se ah modificado una bebida');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bebida = Bebida::find($id);
        $bebida->delete();
        return redirect()->route('bebida.index')->with('status','Se ha eliminado una bebida');

    }
}
