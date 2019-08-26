<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use	Illuminate\Support\Facades\Auth;
use Log;
use App\Referido;
class ReferidoController extends Controller
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
        //
        $referido = Referido::all();
        if (!is_null($referido)) {
            return response()->json(
                $referido->toArray(), 200
                            ); 
        }
        return response()->json("No existen los Referidos",400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        
        try{
            $referido = new Referido;
            $referido->activo = true;
            $referido->id_asociado = Auth::user()->id;
            $referido->user()->associate($request->user);            
            $referido->save();

        }
        catch(\Exception $e)
        {
            Log::critical("No se puede crear un Referido:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $referido = Referido::where('id', $id)->get()->first();
        if (!is_null($referido)) {
            return response()->json(
                $referido->toArray(), 200
                            ); 
        }
        return response()->json("No existe el Referidos",400);
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
        $referido = Referido::where('id', $id)->get()->first();
        if (!is_null($referido)) {
            $referido->delete();
            return response()->json(
                $referido->toArray(), 200
                            ); 
        }
        return response()->json("No existe el Referidos",400);
    }

    
}
