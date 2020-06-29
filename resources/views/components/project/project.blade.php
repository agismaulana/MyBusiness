@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header title-auth">Project data</div>

                <div class="card-body my-4">

                    <div class="d-flex justify-content-between my-3">
                        <a href="/project/create" class="btn btn-primary px-3">
                            Create New Project
                        </a>

                        <form action="/project" class="d-flex">
                            <input type="text" class="form-control mr-2" name="search" placeholder="Search...">
                            <button class="btn btn-primary">Search</button>
                        </form>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped table-hovered table-bordered text-center">
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Time Start</td>
                            <td>Time Finish</td>
                            <td>Group</td>
                            <td>Client</td>
                            <td>Pay</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        <?php $no= 1; ?>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->time_start }}</td>
                            <td>{{ $project->time_end }}</td>
                            <td>{{ $project->group->name}}</td>
                            <td>{{ $project->client->name }}</td>
                            <td>Rp.{{ $project->pay }}</td>
                            <td>
                                @if($project->status == "processed")
                                <p class="badge badge-warning py-2 px-2">
                                    {{ $project->status}}
                                </p>
                                @elseif($project->status == "confirmed")
                                <p class="badge badge-danger py-2 px-2">
                                    {{ $project->status}}
                                </p>
                                @endif
                            </td>
                            <td>
                                <a href="/project/edit/{{ $project->id }}" class="btn btn-success">Edit</a>
                                <a href="/project/delete/{{ $project->id }}" class="btn btn-danger">Delete</a>
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
