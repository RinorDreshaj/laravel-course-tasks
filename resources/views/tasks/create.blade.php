@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Task</div>
                    <div class="card-body">
                        <form action="{{ url("tasks") }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="description" />
                            <input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection