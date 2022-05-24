<?php

namespace App\Http\Controllers\fdr;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\fdr\Recipe;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
	/*
	 * Send a paginated array of given recipes.
	*/
	public function index()
	{
		$view_data['recipe'] = '';
		return view('fdr.pages.recipe.dashboard', $view_data);
	}
	/*
	 * Allow admins and writers to view create recipe page.
	*/
	public function create()
	{
		$recipe = new Recipe();
		$this->authorize('create', $recipe);
		return view('fdr.pages.recipe.create');
	}
	/*
	 * Allow admins and writers to create recipe.
	*/
	public function store(Request $request)
	{
		$recipe = new Recipe();
		$this->authorize('store', $recipe);
		$this->validate($request, [
			'title' => 'required|string|min:4|max:255|unique:posts,title',
			'summary' => 'required|string|min:4|max:255',
			'type' => 'required|in:foodie,review,travel',
			'content' => 'required|string',
			'avialable_at' => 'required|date',
			'draft' => 'required|boolean',
		]);

		$request->request->add(['user_id' => \Auth::user()->id]);
		$recipe = Recipe::create($request->all());
		
		return redirect($recipe->url);
	}
	/*
	 * Allow anyone to view recipes that are not in draft mode or not published yet.
	*/
	public function show($type, $id, $slug)
	{
		$recipe = Recipe::findOrFail($id);

		if ($slug !== $recipe->slug) {
			return redirect()->to($recipe->url);
		}

		if ($type !== $recipe->type) {
			return redirect()->to($recipe->url);
		}

		//Only allow admins and writers to see recipes that are scheduled for future dates.
		if( ($recipe->avialable_at > \Carbon\Carbon::now()) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		//Only allow admins and writers to see recipes that are in draft mode.
		if( ($recipe->draft == true) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}

		$view_data['recipe'] = $recipe;
		return view('fdr.pages.recipe.show', $view_data);
	}
	/*
	 * Allow admins and writers to see edit recipe page.
	*/
	public function edit($id)
	{
		$recipe = Recipe::findOrFail($id);
		$this->authorize('edit', $recipe);
		$view_data['recipe'] = $recipe;
		return view('fdr.pages.recipe.edit', $view_data);
	}
	/*
	 * Allow admins and writers to edit recipe.
	*/
	public function update(Request $request, $id)
	{
		$recipe = Recipe::findOrFail($id);
		$this->authorize('update', $recipe);
		$this->validate($request, [
			'title' => 'required|string|min:4|max:255',
			'summary' => 'required|string|min:4|max:255',
			'type' => 'required|in:foodie,review,travel',
			'content' => 'required|string',
			'avialable_at' => 'required|date',
			'draft' => 'required|boolean',
		]);
		if ($request->title != $recipe->title){
			$this->validate($request, [
				'title' => 'unique:recipes,title',
			]);
		}
		$recipe->update($request->all());
		return redirect($recipe->url);
	}
	/*
	 * Allow admins and writers to dete recipe.
	*/
	public function destroy($id)
	{
		$recipe = Recipe::findOrFail($id);
		$this->authorize('destroy', $recipe);
		$recipe->delete();
		return redirect('/');
	}
	/*
	 * Display a print friendly version of a recipe
	*/
	public function printfriendly($id)
	{
		$recipe = Recipe::findOrFail($id);
		//Only allow admins and writers to see recipes that are scheduled for future dates.
		if( ($recipe->avialable_at > \Carbon\Carbon::now()) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		//Only allow admins and writers to see recipes that are in draft mode.
		if( ($recipe->draft == true) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}

		$view_data['recipe'] = $recipe;
		return view('fdr.pages.recipe.printfriendly', $view_data);
	}
}