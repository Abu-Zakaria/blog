<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
    	$validator = Validator::make($request->all(), 
		[
			'email' => "required|email",
			'password' => "required|string|min:6",
		]);

		if($validator->fails())
		{
			return response()->json($validator->errors(), 422);
		}

		if( ! $token = JWTAuth::attempt($validator->validated()) )
		{
			return response()->json(['error' => "Unauthorized"], 401);
		}

		return $this->createNewToken($token);
    }

    public function register(Request $request)
    {
    	$validator = Validator::make($request->all(), 
    	[
    		'name' => 'required|string|between:2,100',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|string|min:6|confirmed',
    	]);

    	if($validator->fails())
    	{
    		return response()->json($validator->errors()->toJson(), 400);
    	}

    	$user = User::create(array_merge(
    		$validator->validated(),
    		['password' => bcrypt($request->password)],
    	));

    	return response()->json([
    		'message' => 'User successully created!',
    		'user' => $user,
    	], 200);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    public function userProfile() {
        return response()->json(auth()->user());
    }

    public function createNewToken($token)
    {
    	return response()->json([
    		'access_token' => $token,
    		'token_type' => 'bearer',
    		'expires_in' => JWTAuth::factory()->getTTL() * 60,
    		'user' => auth()->user(),
    	]);
    }

    private function guard()
    {
    	return Auth::guard();
    }
}
