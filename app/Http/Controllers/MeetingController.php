<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Project;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $search = $request->search;

        if($search) {
            $meetings = Meeting::where('project_id', 'like', "%". $search ."%")->get();
        } else {
            $meetings = Meeting::paginate(5);
        }

        return view('components.meeting.meeting', ['meetings' => $meetings]);
    }

    public function create() {
        $projects = Project::get();

        return view('components.meeting.createMeeting', ['projects' => $projects]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'theme' => 'required',
            'place' => 'required',
        ]);

        $meetings = Meeting::create([
           'project_id' => $request->project, 
           'theme' => $request->theme,
           'place' => $request->place,
           'time' => $request->time,
        ]);
        
        return redirect('/meeting')->with(['status' => 'Data Has Been Added']);
    }

    public function edit($id){
        $meetings = Meeting::find($id);
        $projects = Project::get();

        return view('components.meeting.editMeeting', ['meetings' => $meetings ,'projects' => $projects]);
    }

    public function update($id, Request $request) {
        $meetings = Meeting::find($id);
        $meetings->place = $request->place;
        $meetings->time = $request->time;
        $meetings->save();

        return redirect('/meeting')->with(['status' => 'Data Has Been Updated']);
    }

    public function delete($id) {
        $meetings = Meeting::find($id);
        $meetings->delete();

        return redirect('/meeting')->with(['status' => 'Data Has Been Deleted']);
    }
}
