@extends('layout')

@section('content')

    <div class="form-group row">
      <div class="col-lg-12 col-lg-6-offset-3">
        <form action="{{ route('todo.save', ['id' => $todolist_update->id]) }}" method="post">
        {!! csrf_field() !!}
        <input class="form-control input-lg" type="text" value="{{ $todolist_update->todo }}" name="todo_form" placeholder="Creat a new todo">
        </form>
      </div>
    </div>

        <hr>

@stop