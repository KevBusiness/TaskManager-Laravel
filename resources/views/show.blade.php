@extends('layouts.app')
@section('title', $task->title)
@section('content')
  <div>
    <a href="{{ route('tasks.index') }}" class="link">← Go back to the list of tasks</a>
  </div>

  <div class="space-y-4 my-4">
    <p class="text-slate-700">{{$task->description}}</p>
    @if ($task->long_description)
    <p class="text-slate-700">{{$task->long_description}}</p>
    @endif
    <p class="text-sm text-slate-500">Created {{$task->created_at->diffForHumans()}} * Updated {{$task->updated_at->diffForHumans()}}</p>
    <p>
      @if ($task->completed)
        <span class="font-medium text-green-500">Completed</span>
      @else
        <span class="font-medium text-red-500">Not Completed</span>
      @endif
    </p>
  </div>

  <div class="flex gap-x-2">
    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
      class="btn">Edit</a>

    <form action="{{route('tasks.toggle-complete', ['task' => $task->id])}}" method="POST">
      @csrf
      @method('PUT')
      <button type="submit" class="btn">Mark as {{$task->completed ? 'not completed' : 'completed'}}</button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn">Delete</button>
  </div>
@endsection
