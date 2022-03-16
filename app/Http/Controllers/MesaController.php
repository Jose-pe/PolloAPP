<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Bebida;
use App\Models\Platillo;
use App\Models\Complemento;
use Illuminate\Http\Request;
use Response;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mesas = Mesa::all();
        return view('mesas-admin.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mesas-admin.create');

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
        $mesa = Mesa::create($input);
        
        return redirect()->route('mesa.index')->with('status','Se ah creado una nueva mesa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mesa= Mesa::find($id);
        /*$bebidas=Bebida::all();
        $platillos= Platillo::all();
        $complementos= Complemento::all();*/
        return view('mesas-meseros.show', compact('mesa'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $mesa= Mesa::find($id);
        return view('mesas-admin.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input= $request->all();
        $mesa= Mesa::find($id);
        $mesa->update($input);
        return redirect()->route('mesa.index')->with('status','Se ah editado una mesa');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $mesa = Mesa::find($id);
        $mesa->delete();
        return redirect()->route('mesa.index')->with('status','Se ah eliminado la mesa');

        
    }

    public function mostrarmesas()
    {
        $mesas = Mesa::all();
        return view('mesas-meseros.index', compact('mesas'));
    }

    public function mesaupdate(Request $request,$id){
        $input= $request->all();
        $mesa= Mesa::find($id);
        $mesa->update($input);
    }

    public function mostrarmesascaja(){
        $mesas = Mesa::all();
        return view('mesas-cajero.index', compact('mesas'));
    }
    public function mostrarmesacaja($id){
        $mesa= Mesa::find($id);
        return view('pedidos-cajeros.index', compact('mesa'));
    }

    public function mostrarmesasjson(){
        $mesas= Mesa::all();
        return Response::json(
            array('success'=> true,
                    'mesas'=>$mesas
        ),200);
    }

}
