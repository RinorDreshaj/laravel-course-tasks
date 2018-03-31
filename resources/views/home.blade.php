@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">
                    <form action="{{ url('tasks') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="description" />
                        <input type="submit" />
                    </form>
                </div>
            </div>
            
            
            <br>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Pershendetje, {{  $user }}
                    <table>
                        <tr>
                            <td>ID</td>
                            <td>User</td>
                            <td>Description</td>
                            <td>Completed</td>
                        </tr>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->user_id }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->completed }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
