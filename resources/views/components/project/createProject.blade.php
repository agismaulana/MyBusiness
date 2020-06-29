@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header title-auth">Project data</div>

                <div class="card-body my-4">
                    
                    <form action="/project/store" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="timeStart">Time Start</label>
                            <input type="date" name="timeStart" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="timeEnd">Time End</label>
                            <input type="date" name="timeEnd" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Group">Group</label>
                            <select name="group" id="group" class="custom-select">
                                <option selected>Select Group</option>
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}">
                                    {{ $group->name }}
                                </option>
                                @endforeach
                            </select>       
                        </div>
                        <div class="form-group">
                            <label for="Client">Client</label>
                            <select name="client" id="client" class="custom-select">
                                <option selected>Select Client</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}">
                                    {{ $client->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pay">Pay</label>
                            <input type="text" class="form-control" name="pay">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/project" class="btn btn-secondary">Back </a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
