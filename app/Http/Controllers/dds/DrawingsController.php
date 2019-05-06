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
		return view('dds.pages.drawings.index', $view_data);
	}
	/*
	 * List drawings by category.
	*/
	public function category($category)
	{
		$pieces = Drawing::where('category','LIKE' ,'%'.$category.'%')->get();
		$view_data['pieces'] = $pieces;
		$view_data['category'] = $category;
		return view('dds.pages.drawings.category', $view_data);
	}
	/*
	 * Show listed drawing.
	*/
	public function piece($category, $piece)
	{
		$view_data['piece'] = Drawing::where('title','=' ,str_replace('-', ' ', $piece))->firstOrFail();
		$view_data['category'] = $category;
		return view('dds.pages.drawings.piece', $view_data);
	}
	/*
	 * Return to page after a piece has been purchased.
	*/
	public function purchased($piece)
	{
		$piece = Drawing::where('jpg','=' ,$piece.'.jpg')->firstOrFail();
		$piece->ebay = '#';
		$piece->amazon = '#';
		$piece->etsy = '#';
		$piece->paypal = 0;
		$piece->value = NULL;
		$piece->save();
		$category = $piece->getPieceCategories()[0];
		$title = str_replace(' ', '-', $piece->title);
		return redirect('/drawings/pencil/'.$category.'/'.$title)->with('successful_purchase', 'Thank you for purchasing '.$piece->title.' by Jeremy Allen.  We will ship your drawing out shortly.');
	}
}
http://127.0.7.10:8000/drawings/purchased/20180718
