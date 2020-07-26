@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('admin/product') }}">
                        {{__('translate.home')}}
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        {{__('translate.login')}}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            @lang('translate.register')
                        </a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                Tasks
            </div>

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
                        <td>

                            <form action="{{route('developer.index')}}" method="post">
                                 @csrf

                                    <select class="form-control status" name="status_id">
                                @foreach($tasks as $task)
                                    <option class="status"
                                        data-id="status"
                                        data-type="select"
                                        data-title="Select status"
                                        data-url="{{ route('developer.index') }}">{{$task->status}}</option>
                                @endforeach
                                    </select>

                            </form>

                        </td>
                        <td>{{$task->description}}</td>

                        <td>
                            <a href="{{url("developer/{$task->id}")}}" class = "btn btn-primary">View</a>
                            <a href="{{url("developer/{$task->id}/edit")}}" class = "btn btn-success">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(function() {
            $('.status').editable({
                source: [
                        @foreach($tasks as $task)
                    { value: '{{ $task->id }}', text: '{{ $task->status }}' }
                    @unless ($loop->last)
                    ,
                    @endunless
                    @endforeach
                ]
            });
        });
    </script>

@endsection


