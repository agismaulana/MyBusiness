<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Group;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $search = $request->search;

        if($search) {
            $users = User::where('name','like',"%". $search ."%")->get();
        } else {
            $users = User::paginate(5);
        }

        return view('components.user.user', ['users' => $users]);
    }

    public function edit($id) {
        $users = User::find($id);

        $roles = Role::get();

        $groups = Group::get();

        return view('/components.user.editUser', ['users' => $users, 'roles' => $roles, 'groups' => $groups]);
    }

    public function update($id,Request $request) {
        $users = User::find($id);
        $users->role_id = $request->role;
        $users->group_id = $request->group;
        $users->save();

        return redirect('/user');
    }

    public function delete($id) {
        $users = User::find($id);
        $users->delete();
        return redirect('/user');
    }
}
