<?php

namespace App\Http\Controllers\ct;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SinglePageController extends Controller
{
	public function dashboard()
	{
		$view_data['posts'] = '';
		return view('ct.pages.dashboard', $view_data);
	}

	public function blank()
	{
		return \Redirect::back()->with('status', 'Unfortunately we are still in the process of building out our site and this resource is not working yet.');
	}

	public function quote(Request $request)
	{
		$data = [
			'name' => $request->name,
			'ctype' => $request->ctype,
			'contact' => $request->contact,
			'ptype' => $request->ptype,
			'timeframe' => $request->timeframe,
			'description' => $request->description
		];
		Mail::send('ct.email.quote', $data, function ($message) {
			$message->from('support@checkeredtile.com', 'CheckeredTile.com');
			$message->to('support@checkeredtile.com');
			$message->subject('Quote Request from Website');
		});
		return  \Redirect::back()->with('status', 'Your request for a quote has been submitted and we will ge back to you as soon as possible.');
	}

	public function contact(Request $request)
	{
		$data = [
			'name' => $request->name,
			'ctype' => $request->ctype,
			'contact' => $request->contact,
			'description' => $request->description
		];
		Mail::send('ct.email.contact', $data, function ($message) {
			$message->from('support@checkeredtile.com', 'CheckeredTile.com');
			$message->to('support@checkeredtile.com');
			$message->subject('Contact Request from Website');
		});
		return  \Redirect::back()->with('status', 'Thank you for reaching out.');
	}
}
