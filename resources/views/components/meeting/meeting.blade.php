@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header title-auth">Data Meeting</div>
                
                <div class="card-body my-4">

                    <div class="d-flex justify-content-between my-2">
                        <a href="/meeting/create" class="btn btn-primary px-3">Create New Meeting</a>
    
                        <form action="/meeting" class="d-flex">
                            <input type="text" name="search" class="form-control mr-2" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <td>No</td>
                            <td>Project</td>
                            <td>theme</td>
                            <td>place</td>
                            <td>Time</td>
                            <td>Action</td>
                        </tr>
                        <?php $no = 1;?>
                        @foreach ($meetings as $meeting)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $meeting->project->name }}</td>
                            <td>{{ $meeting->theme }}</td>
                            <td>{{ $meeting->place }}</td>
                            <td>{{ $meeting->time }}</td>
                            <td>
                                <a href="/meeting/edit/{{ $meeting->id }}" class="btn btn-success">Edit</a>
                                <a href="/meeting/delete/{{ $meeting->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection