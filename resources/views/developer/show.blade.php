@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('developer') }}">Home</a>
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
                Task
            </div>

            <table class = "table table-striped">
                <tr>
                    <td>Task Name</td>
                    <td>{{$tasks->task_name??''}}</td>
                </tr>

                <tr>
                    <td>Created_by</td>
                    <td>{{$tasks->created_by??''}}</td>
                </tr>

                <tr>
                    <td>Assigned To</td>
                    <td>{{$tasks->assigned_to??''}}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>{{$tasks->status??''}}</td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>{{$tasks->description??''}}</td>
                </tr>

            </table>


            <a href = "{{url('developer')}}">Back</a>
        </div>
    </div>
@endsection





