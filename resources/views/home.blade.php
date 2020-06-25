@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5">
                <div class="card-header title-auth">Dashboard</div>

                <div class="card-body my-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="paragraf-home">
                        Welcome {{ Auth::user()->name }} in the My Business
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
