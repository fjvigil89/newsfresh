<?php

namespace App\Http\Controllers;
use Log;
use App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
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
        $noticia = Noticia::all();
        if(!is_null($noticia))
        {
            return response()->json(
                $noticia->toArray(), 200
                            ); 
        }
        return response()->json("No existen las Noticia",400);

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
            $noticia = new Noticia;
            $noticia->asunto = $request->asunto;
            $noticia->descripcion = $request->descripcion;
            $noticia->activo = true;
            $noticia->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede crear una Noticia:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $noticia = Noticia::where('id', $id)->get()->first();
        if(!is_null($noticia))
        {
            return response()->json(
                $noticia->toArray(), 200
                            ); 
        }
        return response()->json("No existen la Noticia",400);
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
         //
         try{
            $noticia =  Noticia::where('id', $id)->get()->first();
            $noticia->asunto = $request->asunto;
            $noticia->descripcion = $request->descripcion;
            $noticia->activo = true;
            $noticia->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede actualizar la Noticia:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $noticia = Noticia::where('id', $id)->get()->first();
        if(!is_null($noticia))
        {
            $noticia->delete();
            return response()->json(
                $noticia->toArray(), 200
                            ); 
        }
        return response()->json("No existen la Noticia",400);
    }
}
