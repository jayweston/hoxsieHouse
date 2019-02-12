<?php

namespace App\Http\Controllers\dds;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SinglePageController extends Controller
{
	public function dashboard()
	{
		$view_data['posts'] = '';
		return view('dds.pages.single.dashboard', $view_data);
	}
	public function about()
	{
		$view_data['posts'] = '';
		return view('dds.pages.single.about', $view_data);
	}
}