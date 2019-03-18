<?php

namespace App\Http\Controllers\dds;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\dds\Drawing;
use App\Http\Controllers\Controller;

class DrawingsController extends Controller
{
	/*
	 * List all drawings.
	*/
	public function index()
	{
		$pieces = Drawing::all();
		$view_data['pieces'] = $pieces;
		return view('dds.pages.single.dashboard', $view_data);
	}
	/*
	 * List drawings by category.
	*/
	public function category($category)
	{
		$pieces = Drawing::where('category','=' ,$category)->get();
		$view_data['pieces'] = $pieces;
		return view('dds.pages.drawings.category', $view_data);
	}
	/*
	 * Show listed drawing.
	*/
	public function piece($category, $piece)
	{
		$piece = Drawing::where('title','=' ,$piece)->firstOrFail();
		$view_data['piece'] = $piece;
		return view('dds.pages.drawings.piece', $view_data);
	}
}
