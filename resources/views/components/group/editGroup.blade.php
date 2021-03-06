@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header title-auth">Edit Group Data</div>
                
                <div class="card-body my-4">
                    <form action="/group/update/{{ $groups->id }}" method="post">
                        {{ csrf_field() }}
                        
                        <input type="hidden" value="{{ $groups->id }}" name="id">

                        <div class="form-group">
                            <label for="name">Name Role</label>
                            <input type="text" class="form-control" name="name" value="{{ $groups->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/group" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection