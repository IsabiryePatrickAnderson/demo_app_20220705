@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-sm btn-secondary" href="{{ url('/create-task') }}">Add Task</a>
            <br>
            @if(session()->has('message'))
                <div class="alert alert-{{resp}}">
                    {{ session()->get('message') }}
                </div>
            @endif
            <br>

            <div class="card">
                <div class="card-header">Tasks Peding Approval</div>

                <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Start Date</th>
                          <th scope="col">End Date</th>
                          <th scope="col">Created By</th>
                          <th scope="col">Approved</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tasks as $t)
                        <tr>
                          <td>{{ $t->name }}</td>
                          <td>{{ $t->description }}</td>
                          <td>{{ $t->start_date }}</td>
                          <td>{{ $t->end_date }}</td>
                          <td>{{ $t->user }}</td>
                          <td>
                            @if(Auth::user()->role = '1')
                              <a class="btn btn-sm btn-info" href="{{ url('/approve-task/'.$t->id) }}">Approve Task
                              </a>
                              @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
