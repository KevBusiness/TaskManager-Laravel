@extends('layouts.app')
@section('title', 'The list of tasks')
@section('content')
  @forelse ( $tasks as $task )
      <a href={{route('tasks.show',['task' => $task->id])}}>{{$task->title}}</a>
  @empty
    <div>There are no tasks!</div>
  @endforelse

  @if ($tasks->count())
      {{$tasks->links()}}
  @endif
@endsection
