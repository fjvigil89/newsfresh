<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Resources\Categorias as CategoriaResource;
use Log;
class CategoriaController extends Controller
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
        $categoria = Categoria::all();
        if (!is_null($categoria)) {
            return response()->json(
            $categoria->toArray(), 200
                        );
        }
        return response()->json("No existen Categorias",400);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $categoria = new Categoria;
            $categoria->nombre = $request->nombre;            
            $categoria->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede crear una Categoria:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $categoria = Categoria::where('id', $id)->get()->first();
        if (!is_null($categoria)) {            
            return response()->json(
                $categoria->toArray(), 200
                            ); 
        }
        return response()->json("No se encuentra la Categoria deseada",400);
        
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
            $categoria = Categoria::where('id', $id)->get()->first();        
            $categoria->nombre = $request->nombre;            
            $categoria->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede actualizar la Categoria:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $categoria = Categoria::where('id', $id)->get()->first();                 
        if (!is_null($categoria)) {            
            $categoria->delete();
            return response()->json(
                $categoria->toArray(), 200
                            ); 
        }
        return response()->json("No se encuentra la Categoria deseada",400);
    }
}
