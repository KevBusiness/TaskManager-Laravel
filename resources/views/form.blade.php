@extends('layouts.app')

@section("title", isset($task) ? "Edit Task!" : "Create a new task!")

@section('content')
  <form method="POST" action="{{isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}" class="space-y-4">
      @csrf
      @isset($task)
        @method('PUT')
      @endisset
      <div>
          <label for="title">Title</label>
          <input
            type="text"
            name="title"
            id="title"
            value="{{ $task->title ?? old('title')}}"
            @class(['border-red-500' => $errors->has('title')])
            >
          @error('title')
            <div class="error">{{ $message }}</div>
          @enderror
      </div>
      <div>
        <label for="description">Description</label>
        <textarea
          name="description"
          id="description"
          rows="5"
          @class(['border-red-500' => $errors->has('description')])
          >{{ $task->description ?? old('description')}}</textarea>
        @error('description')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="long_description">Long Description</label>
        <textarea
          name="long_description"
          id="long_description"
          rows="10"
          @class(['border-red-500' => $errors->has('long_description')])
          >{{$task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="flex justify-between">
        <a href="{{route('tasks.index')}}" class="btn">Cancel</a>
        <button type="submit" class="btn">@isset($task) Update @else Create @endisset</button>
      </div>
  </form>
@endsection
