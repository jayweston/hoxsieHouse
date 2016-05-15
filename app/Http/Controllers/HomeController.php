<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/*
	 * Return a home page for the logged in users.
	 * Not is user.  Should delete before going live.
	*/
	public function index()
	{
		return view('home');
	}
}
