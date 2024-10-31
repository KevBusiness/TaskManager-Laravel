@extends('layouts.app')

@section("title", "Create a new task!")

@section('styles')
  <style>
    .alert-danger {
      color: red;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action={{route('tasks.store')}}>
      @csrf
      <div>
          <label for="title">Title</label>
          <input type="text" name="title" id="title">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5"></textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
        @error('long_description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <button type="submit">Create Task</button>
      </div>
  </form>
@endsection
