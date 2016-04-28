<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
	$user = new User();
	$this->authorize($user);
	$users = User::paginate(10);
	$view_data['users'] = $users;
	return view('pages.user.index', $view_data);
    }

    public function create()
    {
	$user = new User();
	$this->authorize($user);
	return view('pages.user.create');
    }

    public function store(Request $request)
    {
	$user = new User();
	$this->authorize($user);
	$user = User::create($request->all());
	return redirect('user/'.$user->id);
    }

    public function show($id)
    {
	$user = User::findOrFail($id);
	$this->authorize($user);
	$view_data['user'] = $user;
	return view('pages.user.show', $view_data);
    }

    public function edit($id)
    {
	$user = User::findOrFail($id);
	$this->authorize($user);
	$view_data['user'] = $user;
	return view('pages.user.edit', $view_data);
    }

    public function update(Request $request, $id)
    {
	$user = User::findOrFail($id);
	$this->authorize($user);
	$user->update($request->all());
	return redirect('user/'.$id);
    }

    public function destroy($id)
    {
	$user = User::findOrFail($id);
	$this->authorize($user);
	$user->delete();
	return redirect('user/');
    }
}
