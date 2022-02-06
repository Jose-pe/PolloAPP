<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Response;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pedidos = Pedido::all();
        return view('pedidos-cajero.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $input['fecha'] = date('Y-m-d');
        $input['totalapagar']="0.0";
        $pedido=Pedido::create($input);
        return view('mesas-cajero.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idmesa)
    {
        //
        $pedidos = Pedido::where('idmesa','==',$idmesa);
        return view('pedidos-cajero.index', compact('pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pedido = Pedido::find($id);
        $pedido->delete();
        return view('mesas-cajero.show');
    }
    public function pedidojson($idmesa){
        $pedidos = Pedido::all()->where('idmesa',$idmesa)->last();
        return Response::json(
         array('success' => true,
                'pedidos' => $pedidos
        ),200);
    }
}
