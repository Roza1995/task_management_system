@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('manager') }}">
                        HOME
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        LOGIN
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            REGISTER
                        </a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                Tasks
            </div>
            <div class = "col-md-4">
                <form action="/search" method="get">
                    <div class = "input-group">
                        <input type="search" name = "search" class = "form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>

                        </span>

                    </div>

                </form>
            </div>

            </div>


            <a href="{{url("manager/create")}}" class = "btn btn-primary">
                Ad Task
            </a>

            <table class = "table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Task Name</td>
                    <td>Created By</td>
                    <td>Assigned to</td>
                    <td>Status</td>
                    <td>Description</td>
                    <td>Action</td>


                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->task_name}}</td>
                        <td>{{$task->created_by}}</td>
                        <td>{{$task->assigned_to}}</td>
                        <td>{{$task->status}}</td>
                        <td>{{$task->description}}</td>

                        <td>
                            <a href="{{url("manager/{$task->id}")}}" class = "btn btn-primary">View</a>
                            <a href="{{url("manager/{$task->id}/edit")}}" class = "btn btn-success">Edit</a>
                            <form action="{{url("manager/{$task->id}")}}" method = "post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger" >
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection


