@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header title-auth">Client Data</div>

                <div class="card-body my-4">

                    <div class="d-flex justify-content-between my-3">
                        <a href="/client/create" class="btn btn-primary col-md-2">
                            Create New Client
                        </a>

                        <form action="/client" class="d-flex">
                            <input type="text" class="form-control mr-2" name="search">
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
                            <td>Name</td>
                            <td>Company</td>
                            <td>Action</td>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach ($clients as $client)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->company }}</td>
                            <td>
                                <a href="/client/edit/{{ $client->id }}" class="btn btn-success">Edit</a>
                                <a href="/client/delete/{{ $client->id }}" class="btn btn-danger">Delete</a>
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
