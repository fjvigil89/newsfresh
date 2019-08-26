<?php

namespace App\Http\Controllers;
use Log;
use App\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
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
        $recurso = Recurso::all();
        if (!is_null($recurso)) {
            return response()->json(
                $recurso->toArray(), 200
                            ); 
        }
        return response()->json("No existen los Recursos",400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $recurso = new Recurso;
            $recurso->nombre    = $request->nombre; 
            $recurso->url       = $request->url;
            $recurso->activo    = true;
            $recurso->categoria()->associate($request->categoria);
            $recurso->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede crear un Recurso:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $recurso = Recurso::where('id', $id)->get()->first();
        if (!is_null($recurso)) {
            return response()->json(
                $recurso->toArray(), 200
                            ); 
        }
        return response()->json("No existen el Recurso",400);
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
            $recurso = Recurso::where('id', $id)->get()->first();
            $recurso->nombre    = $request->nombre; 
            $recurso->url       = $request->url;
            $recurso->activo    = true;
            $recurso->categoria()->associate($request->categoria);
            $recurso->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede actualizar el Recurso:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
    }
}
