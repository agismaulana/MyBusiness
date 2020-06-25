@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header title-auth">Edit Client Data</div>

                <div class="card-body my-4">

                    <form action="/client/update/{{ $clients->id }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $clients->name }}">
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" name="company" value="{{ $clients->company }}">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection