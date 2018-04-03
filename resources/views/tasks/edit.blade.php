@extends('layouts.app')


@section('content')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>
                    <div class="card-body">
                        <form action="{{ url("tasks/$task->id") }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="text" name="description" value="{{ $task->description  }}" />
                            <input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection