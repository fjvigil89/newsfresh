<?php

namespace App\Http\Controllers;
use Log;
use App\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factura = Factura::all();
        if(!is_null($factura))
        {
            return response()->json(
                $factura->toArray(), 200
                            ); 
        }
        return response()->json("No existen los Factura",400);

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
        try{
            $factura = new Factura;
            $factura->ingresos = $request->ingresos;
            $factura->estado = $request->estado;
            $factura->anno = $request->anno;
            $factura->mes = $request->mes;
            $factura->user()->assosiate($request->user);
            $factura->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede crear una Factura:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
            return response()->json("{$e->getMessage()}",500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $factura = Factura::where('id', $id)->get()->first();
        if(!is_null($factura))
        {
            return response()->json(
                $factura->toArray(), 200
                            ); 
        }
        return response()->json("No existe la Factura",400);

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
        try{
            $factura = Factura::where('id', $id)->get()->first();
            $factura->ingresos = $request->ingresos;
            $factura->estado = $request->estado;
            $factura->anno = $request->anno;
            $factura->mes = $request->mes;
            $factura->user()->assosiate($request->user);
            $factura->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede actualizar una Factura:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
            return response()->json("{$e->getMessage()}",500);
        }
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
        $factura = Factura::where('id', $id)->get()->first();
        if(!is_null($factura))
        {
            $factura->delete();
            return response()->json(
                $factura->toArray(), 200
                            ); 
        }
        return response()->json("No existe lo Factura",400);

    }
}
