@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-5">
                <div class="card-header title-auth">Edit User Data</div>
                
                
                <div class="card-body my-4">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/user/update/{{ $users->id}}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $users->id }}">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $users->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $users->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="custom-select">
                            <option value="{{ $users->role_id }}">{{ $users->role->name }}</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="group">Group</label>
                            <select name="group" id="group" class="custom-select">
                                <option value="{{ $users->group_id }}">{{ $users->group->name }}</option>
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection