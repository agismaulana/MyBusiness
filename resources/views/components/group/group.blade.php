@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header title-auth">Group Data</div>

                <div class="card-body my-4">

                    <div class="d-flex align-items-center justify-content-between my-3">
                        <a href="/group/create" class="btn btn-primary col-md-3">
                            Create New Group
                        </a>

                        <form action="/group" method="GET" class="d-flex">
                            <input type="text" class="form-control mr-3" name="search">
                            <button class="btn btn-primary">Search</button>
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
                            <td>Action</td>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach ($groups as $group)
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>{{ $group->name }}</td>
                            <td>
                                <a href="/group/edit/{{ $group->id }}" class="btn btn-success">Edit</a>
                                <a href="/group/delete/{{ $group->id }}" class="btn btn-danger">Delete</a>
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