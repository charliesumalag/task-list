@extends('layouts.app')

@section('title', $task->title)

@section('content')
    @if ($task->description)
        <p>{{$task->description}}</p>
    @endif
<p>{{$task->long_description}}</p>
<p>{{$task->completed}}</p>
<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>
<form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<form  method="GET" action="{{ route('task.edit', ['task' => $task->id]) }}">
    @csrf
    <button type="submit">Update</button>
</form>
{{-- <a href="{{route('task.edit')}}"></a> --}}
@endsection
