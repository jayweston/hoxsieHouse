<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Tag;

class TagController extends Controller
{
	/*
	 * List all tags used.  Avialable to all admins and writers.
	*/
	public function index()
	{
		$tag = new Tag();
		$tags = Tag::paginate(50);
		$view_data['tags'] = $tags;
		return view('pages.tag.index', $view_data);
	}
	/*
	 * Show all uses of a given tag.
	*/
	public function show($id)
	{
		$tag = Tag::findOrFail($id);
		$view_data['tag'] = $tag;
		return view('pages.tag.show', $view_data);
	}
	/*
	 * Allow admins to edit a tag.
	*/
	public function update(Request $request, $id)
	{
		$tag = Tag::findOrFail($id);
		$this->authorize($tag);
		$this->validate($request, [
			'name' => 'required|string|min:1|max:255|unique:tags,name'
		]);
		$tag->update($request->all());
		return redirect('tag/');
	}
	/*
	 * Allow admin to delete a tag.
	*/
	public function destroy($id)
	{
		$tag = Tag::findOrFail($id);
		$this->authorize($tag);
		$tag->delete();
		return redirect('tag/');
	}
}