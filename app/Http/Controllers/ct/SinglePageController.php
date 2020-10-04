<?php

namespace App\Http\Controllers\ct;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SinglePageController extends Controller
{
	public function dashboard()
	{
		$view_data['posts'] = '';
		return view('ct.pages.single.dashboard', $view_data);
	}

	public function blank()
	{
		return \Redirect::back()->with('status', 'Unfortunately we are still in the process of building out our site and this resource is not working yet.');
	}

	public function quote(Request $request)
	{
		return  \Redirect::back()->with('status', 'Your request for a quote has been submitted and we will ge back to you as soon as possible.');
	}

	public function contact(Request $request)
	{
		return  \Redirect::back()->with('status', 'Thank you for reaching out.');
	}
}
