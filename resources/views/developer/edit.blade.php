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
                <h1> Edit Task</h1>
            </div>
            <form action="{{route('developer.update', $tasks->id)}}" method="post">
                @csrf
                @method("PUT")

                <label for="status">Status</label>
                <input type="text" name = "status" id = "status"
                       value = {{$tasks->status}}><br>


                <input type="submit" value = "Save">
            </form>
        </div>
    </div>
@endsection


