@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <a href="{{ url('tasks/create') }}">Add New Task</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-responsive">
                        <tr>
                            <td>ID</td>
                            <td>User</td>
                            <td>Description</td>
                            <td>Completed</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->user_id }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->completed }}</td>
                            <td><a href='{{ url("tasks/$task->id/edit") }}'>Edit</a></td>
                            <td>
                                <form action="{{ url("tasks/$task->id") }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input type="submit" value="DELETE">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
