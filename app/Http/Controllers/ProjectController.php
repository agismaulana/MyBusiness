<?php

namespace App\Http\Controllers;

use App\Project;
use App\Group;
use App\Client;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $search = $request->search;

        if($search) {
            $projects = Project::where('name', 'like', "%". $search ."%")->get();
        } else {
            $projects = Project::paginate(5);
        }

        return view('components.project.project', ['projects' => $projects]);
    }

    public function create() {
        $clients = Client::get();
        $groups = Group::get();

        return view('components.project.createProject', ['clients' => $clients, 'groups' => $groups]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'pay' => 'required',
        ]);

        $projects = Project::create([
            'name' => $request->name,
            'time_start' => $request->timeStart,
            'time_end' => $request->timeEnd,
            'group_id' => $request->group,
            'client_id' => $request->client,
            'pay' => $request->pay,
            'status' => 'confirmed',
        ]);

        return redirect('/project');
    }
}
