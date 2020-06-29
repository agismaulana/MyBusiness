<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $search = $request->search;
        if($search) {
            $roles = Role::where('name','like',"%". $search ."%")->get();
        } else {
            $roles = Role::paginate(5);
        }

        return view('components.role.role', ['roles' => $roles]);
    }

    public function create() {
        return view('components.role.createRole');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $create = Role::create([
            'name' => $request->name,
        ]);

        return redirect('/role');
    }

    public function edit($id) {
        $role = Role::find($id);

        return view('components.role.editRole', ['role' => $role]);
    }

    public function update($id , Request $request) {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        return redirect('/role');
    }

    public function delete($id) {
        $id = Role::find($id);
        $delete = $id->delete();
        return redirect('/role');
    }
}