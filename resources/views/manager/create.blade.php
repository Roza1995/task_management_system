@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('manager') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                <h1>Create Task</h1>
            </div>
            <form action="{{ url('manager') }}" method="post" class="form-control-range">
                @csrf
                <label for="task_name">Task Name</label>
                <input type="text" name = "task_name" id = "task_name"><br>
                <label for="created_by">Created by</label>
                <input type="text" name = "created_by" id = "created_by"><br>
                <label for="assigned_to">Assigned To</label>
                <input type="text" name = "assigned_to" id = "assigned_to"><br>
                <label for="status">Status</label>
                <input type="text" name = "status" id = "status"><br>
                <label for="description">Description</label>
                <input type="textarea" name = "description" id = "description">

                <input type="submit" value = "Save">


            </form>
        </div>
    </div>
@endsection



