@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-5">
                <div class="card-header title-auth">Role Data</div>
                
                
                <div class="card-body my-4">
                    <div class="d-flex justify-content-between">
                        <a href="/role/create" class="btn btn-primary col-md-3">
                            Create New Roles
                        </a>

                        <form action="/role" class="d-flex" method="GET">
                            <input type="text" class="form-control" placeholder="Search..." name="search">
                            <button class="ml-2 btn btn-primary" type="submit">Search</button>
                        </form>

                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover table-striped mt-3 text-center" style="font-size: 15px;">
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                        <?php $no = 1;?>
                        @foreach ($roles as $role)
                        <tr>
                            <td><?= $no++;?></td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="/role/edit/{{ $role->id }}" class="btn btn-success">Edit</a>
                                <a href="/role/delete/{{ $role->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="card-footer">
                    {{ $roles->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection