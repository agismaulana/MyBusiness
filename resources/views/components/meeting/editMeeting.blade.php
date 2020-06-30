@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header title-auth">Create Data Meeting</div>
                
                <div class="card-body my-4">
                    <form action="/meeting/update/{{ $meetings->id }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="project">Project</label>
                            <select name="project" id="project" class="custom-select" disabled>
                                <option value="{{ $meetings->project_id }}">{{ $meetings->project->name }}</option>
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="theme">Theme</label>
                            <textarea name="theme" id="theme" cols="30" rows="10" class="form-control" disabled>{{ $meetings->theme }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="place">Place</label>
                            <input type="text" class="form-control" name="place" value="{{ $meetings->place }}">
                        </div>
                        <div class="form-group">
                            <label for="time">time</label>
                            <input type="date" class="form-control" name="time" value="{{ $meetings->time }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/meeting" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection