<?php

namespace App\Http\Controllers\hh;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\hh\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
	/*
	 * List all tags used.  Avialable to all admins and writers.
	*/
	public function index()
	{
		$tags = \DB::select(\DB::raw('SELECT t.id, t.name, t2.cnt FROM tags t JOIN (SELECT tag_id, COUNT(*) AS cnt FROM post_tags GROUP BY tag_id) t2 ON (t2.tag_id = t.id) ORDER BY t2.cnt DESC'));
		$view_data['tags'] = $tags;
		return view('hh.pages.tag.index', $view_data);
	}
	/*
	 * Show all uses of a given tag.
	*/
	public function show($id)
	{
		$tag = Tag::findOrFail($id);
		$view_data['tag'] = $tag;
		return view('hh.pages.tag.show', $view_data);
	}
	/*
	 * Allow admins to edit a tag.
	*/
	public function update(Request $request, $id)
	{
		$tag = Tag::findOrFail($id);
		$this->authorize('update', $tag);
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
		$this->authorize('destroy', $tag);
		$tag->delete();
		return redirect('tag/');
	}
}
