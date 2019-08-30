<?php

namespace App\Http\Controllers;


use  JWTAuth;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterAuthRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\ReferidoController;
class AuthController extends Controller
{
 
    public  $loginAfterSignUp = true;

    public  function  register(Request  $request) {

	$user 					= new  User();
	$user->name 			= $request->name;		
	$user->email 			= $request->email;
	$user->password 		= Hash::make($request->password);                
	$user->activo 			= true;
	$user->identidad 		= $request->identidad;
	$user->direccion		= $request->direccion;
	$user->telefono			= $request->telefono;
	$user->pais				= $request->pais;
	$user->estado			= $request->estado;
	$user->ciudad			= $request->ciudad;
	$user->tipo_cuenta		= $request->tipo_cuenta;
	$user->numero_cuenta	= $request->numero_cuenta;

	$user->save();
	
	if ($this->loginAfterSignUp) {
		$data = $this->login($request);  
		if ($request->has('user_id')) {		    
		    ReferidoController::store(new Request(array('user' =>$request->user_id)));		    
		}
		return $data;
		
	}        
	return  response()->json([
	    'status' => 'ok',
	    'data' => $user,
	]);
   }

    public  function  login(Request  $request) {
	$input = $request->only('email', 'password');
	$jwt_token = null;
	if (!$jwt_token = JWTAuth::attempt($input)) {
		return  response()->json([
			'status' => 'invalid_credentials',
			'message' => 'Correo o contraseña no válidos.',
		], 401);
	}

	return  response()->json([
		'status' => 'ok',
		'token' => $jwt_token,
	]);	
    }

	public  function  logout(Request  $request) {
		$this->validate($request, [
			'token' => 'required'
		]);

		try {
			JWTAuth::invalidate($request->token);
			return  response()->json([
				'status' => 'ok',
				'message' => 'Cierre de sesión exitoso.'
			]);
		} catch (JWTException  $exception) {
			return  response()->json([
				'status' => 'unknown_error',
				'message' => 'Al usuario no se le pudo cerrar la sesión.'
			], 500);
		}
	}

	public  function  getAuthUser(Request  $request) {
		$this->validate($request, [
			'token' => 'required'
		]);

		$user = JWTAuth::authenticate($request->token);
		return  response()->json(['user' => $user]);
	}
}
