@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">TODO</div>

                <div class="panel-body">
                    <a href="/addTodo" class="btn btn-primary">Add Todo</a>
                    <table class='table'>
                        <thead>
                            <th>Todo</th>
                            <th>Action</th>
                        </thead>
                        @foreach($todos as $todo)
                            <tr>
                                <td>{{$todo->name}}</td>
                                <td>
                                    <a href="/todo/edit/{{$todo->id}}" class="btn btn-warning">Edit</a>
                                    <form action="/todo/{{ $todo->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-danger">Delete Todo</button>
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
