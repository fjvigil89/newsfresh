<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Url;
class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        
        $url = Url::all();
        if (!is_null($url)) {
            return response()->json(
            $url->toArray(), 200
                        );
        }
        return response()->json("No existen urls",400);
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
        
        try {
            $url = new Url;
            $url->urlAcotada = $request->urlAcotada;
            $url->urlOriginal= $request->urlOriginal;            
            $url->visitas= $request->visitas;
            $url->activo= $request->activo;
            $url->titulo = $request->titulo;        
            $url->categoria()->associate($request->categoria);
            $url->user()->associate(Auth::user()->id);
            $url->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede crear una Url:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $url = Url::where('id', $id)->get()->first();
        if (!is_null($url)) {            
            return response()->json(
                $url->toArray(), 200
                            ); 
        }
        return response()->json("No se encuentra la Url deseada",400);
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
    }
}
