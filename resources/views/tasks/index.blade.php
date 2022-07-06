@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-sm btn-secondary" href="{{ url('/create-task') }}">Add Task</a>
            <br>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <br>

            <div class="card">
                <div class="card-header">All Tasks</div>

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
                          <th scope="col">Approved By</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
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
                          <td>{{ $t->approved }}</td>
                          <td>{{ $t->approved_by }}</td>
                          <td>
                              <a class="btn btn-sm btn-info" href="{{ url('/edit-task/'.$t->id) }}">Edit
                              </a>
                          </td>
                          <td>
                              <a class="btn btn-sm btn-danger" href="{{ url('/delete-task/'.$t->id) }}">Delete
                              </a>
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
