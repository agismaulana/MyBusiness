<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;


class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $search = $request->search;

        if($search) {
            $groups = Group::where('name','like',"%". $search ."%")->paginate(5);
        } else {
            $groups = Group::paginate(5);
        }
        
        return view('components.group.group', ['groups' => $groups]);
    }

    public function create() {
        return view('components.group.createGroup');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required'
        ]);

        $groups = Group::create([
            'name' => $request->name
        ]);

        return redirect('/group');
    }

    public function edit($id) {
        $groups = Group::find($id);
        
        return view('components.group.editGroup', ['groups' => $groups]);
    }

    public function update($id , Request $request) {
        $groups = Group::find($id);
        $groups->name = $request->name;
        $groups->save();

        return redirect('/group');
    }

    public function delete($id) {
        $groups = Group::find($id);
        $groups->delete();

        return redirect('/group');
    }
}
