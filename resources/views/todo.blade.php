@extends('layouts.app')

@section('content')

    <div class="panel-body">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong!</strong>

                <br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{$action_url}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="todo" class="col-sm-3 control-label">Todo</label>

                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="@if(isset($todo->name)){{$todo->name}}@endif">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection