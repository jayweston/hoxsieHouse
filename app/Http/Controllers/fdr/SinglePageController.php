<?php

namespace App\Http\Controllers\fdr;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SinglePageController extends Controller
{
	public function dashboard()
	{
		$view_data['posts'] = '';
		$view_data['post_type'] = '';
		return view('hh.pages.single.dashboard', $view_data);
	}
	public function tos()
	{
		return view('hh.pages.single.tos');
	}
	public function privacy()
	{
		return view('hh.pages.single.privacy');
	}
}
