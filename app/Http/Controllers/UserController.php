<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UserController extends Controller
{
	/*
	 * List all current users.  Avialable to all logged in users.
	*/
	public function index()
	{
		$user = new User();
		$this->authorize($user);
		$users = User::paginate(10);
		$view_data['users'] = $users;
		return view('pages.user.index', $view_data);
	}
	/*
	 * Create new uswer account page. Viewable to only admins.
	 * Different than the registration page.
	*/
	public function create()
	{
		$user = new User();
		$this->authorize($user);
		return view('pages.user.create');
	}
	/*
	 * Save newly created user by admin.
	*/
	public function store(Request $request)
	{
		$user = new User();
		$this->authorize($user);
		$user = User::create($request->all());
		return redirect('user/'.$user->id);
	}
	/*
	 * Show a single user account.  Displays their basic information and
	 * the posts and comments then created.
	*/
	public function show($id)
	{
		$user = User::findOrFail($id);
		$this->authorize($user);
		$view_data['user'] = $user;
		return view('pages.user.show', $view_data);
	}
	/*
	 * User edit page.  Allows users to edit thier details or delete their account.
	 * Viewable to admins and users own account.
	*/
	public function edit($id)
	{
		$user = User::findOrFail($id);
		$this->authorize($user);
		$view_data['user'] = $user;
		return view('pages.user.edit', $view_data);
	}
	/*
	 * Allow admin or users to update their own account.
	*/
	public function update(Request $request, $id)
	{
		$user = User::findOrFail($id);
		$this->authorize($user);
		$user->update($request->all());
		return redirect('user/'.$id);
	}
	/*
	 * Allow admin or users to delete their own account.
	*/
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$this->authorize($user);
		$user->delete();
		return redirect('user/');
	}
}