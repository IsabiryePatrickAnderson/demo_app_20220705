@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">

                          @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br>
    <br>
@endif

@if(session()->has('message'))
    <div class="alert alert-{{resp}}">
        {{ session()->get('message') }}
    </div>
@endif

            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/store-task') }}">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Task Name</label>
                        <input type="text" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Task Description</label>
                        <input type="text" name="description" class="form-control">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="exampleInputPassword1">Start Date</label>
                            <input type="date" name="start_date" class="form-control">
                          </div>
                          <div class="col-md-6">
                            <label for="exampleInputPassword1">End Date</label>
                            <input type="date" name="end_date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
