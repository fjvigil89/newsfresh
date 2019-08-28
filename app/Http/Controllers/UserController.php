<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\User;
use	Illuminate\Support\Facades\Auth;
class UserController extends Controller
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
        $user = User::all();
        if (!is_null($user)) {
            return response()->json(
            $user->toArray(), 200
                        );
        }
        return response()->json("No existen usuarios",400);
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
        $user = User::where('id', $id)->get()->first();
        if (!is_null($user)) {
            return response()->json(
            $user->toArray(), 200
                        );
        }
        return response()->json("No existen usuarios",400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAuthenticate()
    {
        //
        
        $user = Auth::user();
        if (!is_null($user)) {
            return response()->json(
            $user->toArray(), 200
                        );
        }
        return response()->json("No existen usuarios",400);
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
        try {
            $user = User::where('id', $id)->get()->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->ranking = $request->ranking;
            $user->rol = $request->rol;
            $user->password = Hash::make($request->password);
            $user->activo = $request->activo;
            $user->save();
        }
        catch(\Exception $e)
        {
            Log::critical("No se puede actualizar el Usuario:  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()} ");
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
        $user = User::where('id', $id)->get()->first();
        if (!is_null($user) && !Auth::user()->id == $id) {
            $user->delete();
            return response()->json(
            $user->toArray(), 200
                        );
        }
        return response()->json("No existen usuarios",400);
    }
}
