<?php

namespace App\Http\Controllers;


use  JWTAuth;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterAuthRequest;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //
    public  $loginAfterSignUp = true;

	public  function  register(Request  $request) {

		$user = new  User();
		$user->name = $request->name;		
		$user->email = $request->email;
		$user->password = Hash::make($request->password);                
		$user->activo = true;
		$user->save();
		
		if ($this->loginAfterSignUp) {
			$data = $this->login($request);  
			$user->token = JWTAuth::attempt($request->only('email', 'password'));
			$user->save();          
		}        
		return  response()->json($data, 200);
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
