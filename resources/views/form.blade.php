@extends('layouts.app')



@section("title", isset($task) ? "Edit Task!" : "Create a new task!")

@section('styles')
<style>
  .alert-danger {
    color: red;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action="{{isset($task) ? route('tasks.update', ['task' => $task-id]) : route('tasks.store')}}">
      @csrf
      @isset($task)
        @method('PUT')
      @endisset
      <div>
          <label for="title">Title</label>
          <input type="text" name="title" id="title" value="{{ $task-title ?? old('title')}}">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5">{{ $task-description ?? old('description')}}</textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10">{{$task-long_description ?? old('long_description')}}</textarea>
        @error('long_description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <button type="submit">@isset($task) Update @else Create @endisset</button>
      </div>
  </form>
@endsection
