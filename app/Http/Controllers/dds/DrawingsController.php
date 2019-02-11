<?php

namespace App\Http\Controllers\dds;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DrawingsController extends Controller
{
	/*
	 * Send a paginated array of given posts.
	*/
	public function index()
	{
		$view_data['posts'] = '';
		return view('dds.pages.single.dashboard', $view_data);
	}
	/*
	 * Allow anyone to view posts that are not in draft mode or not published yet.
	*/
	public function category($category)
	{
		$view_data['post'] = '';
		return view('dds.pages.drawings.category', $view_data);
	}
	/*
	 * Allow anyone to view posts that are not in draft mode or not published yet.
	*/
	public function piece($category, $piece)
	{
		$view_data['post'] = '';
		return view('dds.pages.drawings.piece', $view_data);
	}
}
