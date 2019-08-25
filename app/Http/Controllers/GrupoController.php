<?php

namespace App\Http\Controllers;
use Log;
use App\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
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
        $grupo = Grupo::all();
        if(!is_null($grupo))
        {
            return response()->json(
                $grupo->toArray(), 200
                            );
        }

        return response()->json("No existen Grupos",400);
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
        //
        try {
            $grupo = new Grupo;
            $grupo->nombre= $request->nombre;
            $grupo->url= $request->url;
            $grupo->seguidores= $request->seguidores;
            $grupo->activo= true;
            $grupo->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede crear el Grupo:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $grupo = Grupo::where('id', $id)->get()->first(); 
        if (!is_null($grupo)) {                        
            return response()->json(
                $grupo->toArray(), 200
                            ); 
        }
        return response()->json("No se encuentra el grupo deseada",400);
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
        try {
            $grupo = Grupo::where('id', $id)->get()->first();
            $grupo->nombre= $request->nombre;
            $grupo->url= $request->url;
            $grupo->seguidores= $request->seguidores;
            $grupo->activo= true;
            $grupo->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede actualizar el Grupo:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $grupo = Grupo::where('id', $id)->get()->first(); 
        if (!is_null($grupo)) {            
            $grupo->delete();
            return response()->json(
                $grupo->toArray(), 200
                            ); 
        }
        return response()->json("No se encuentra el grupo deseada",400);
        
    }
}
