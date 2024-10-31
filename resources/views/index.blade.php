@extends('layouts.app')
@section('title', 'The list of tasks')
@section('content')
  @forelse ( $tasks as $task )
      <li>{{$task->title}}</li>
  @empty
    <div>There are no tasks!</div>
  @endforelse
@endsection
