@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header title-auth">Create Group Data</div>

                <div class="card-body my-4">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/group/store" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
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