<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	return inertia('Home');
    }

    public function signIn()
    {
    	return inertia('Auth/Login');
    }

    public function signUp()
    {
    	return inertia('Auth/SignUp');
    }
}
