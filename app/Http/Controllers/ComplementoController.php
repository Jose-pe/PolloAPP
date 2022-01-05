<?php

namespace App\Http\Controllers;

use App\Models\Complemento;
use Illuminate\Http\Request;

class ComplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $complementos = Complemento::all();
        return view('complementos-admin.index', compact('complementos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('complementos-admin.create');
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
        $input = $request->all();
        $complemento = Complemento::create($input);

        return redirect()->route('complemento.index')->with('status','Se ah creado un nuevo complemento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function show(Complemento $complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $complemento= Complemento::find($id);
        return view('complementos-admin.edit', compact('complemento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input= $request->all();
        $complemento= Complemento::find($id);
        $complemento->update($input);
        return redirect()->route('complemento.index')->with('status','Se ah modificado un complemento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $complemento = Complemento::find($id);
        $complemento->delete();
        return redirect()->route('complemento.index')->with('status', 'Se ah eliminado un complemento');
    }
}
