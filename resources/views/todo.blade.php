@extends('layout')

@section('content')

    <div class="form-group row">
      <div class="col-lg-6 col-lg-6-offset-3">
        <form action="/create/todo" method="post">
        {!! csrf_field() !!}
        <input class="form-control input-lg" type="text" name="todo_form" placeholder="Creat a new todo">
        </form>
      </div>
    </div>

    <br>

    @foreach($todolist as $value)

        {{ $value->todo }} 

        <a href="{{ route('todo.delete', ['id' => $value->id]) }}" class="btn btn-danger"> Del </a>

        <a href="{{ route('todo.update', ['id' => $value->id]) }}" class="btn btn-info"> Update </a>
        
        @if(!$value->completed)

            <a href="{{ route('todo.completed', ['id' => $value->id]) }}" class="btn btn-success">Mark Complete</a>

        @else

            <span>Completed !</span>

        @endif

        <hr>

    @endforeach

@stop