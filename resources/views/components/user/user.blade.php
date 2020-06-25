@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header title-auth">User Data</div>

                <div class="card-body my-4">
                    
                    <div class="d-flex justify-content-end my-3">
                        <form action="/user" class="d-flex">
                            <input type="text" class="form-control mr-2" name="search">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered table-striped text-center">
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Group</td>
                            <td>Action</td>
                        </tr>
                        <?php $no=1; ?>
                        @foreach ($users as $user)
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->group->name }}</td>
                            <td>
                                <a href="/user/edit/{{ $user->id }}" class="btn btn-success">Edit</a>
                                <a href="/user/delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
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