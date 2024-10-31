<h1>The list of tasks</h1>
<div>
  @forelse ( $tasks as $task )
      <li>{{$task->title}}</li>
  @empty
    <div>There are no tasks!</div>
  @endforelse
</div>
