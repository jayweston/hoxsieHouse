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

	public function blank()
	{
		return \Redirect::back()->with('status', 'Unfortunately we are still in the process of building out our site and this resource is not working yet.');
	}
}

