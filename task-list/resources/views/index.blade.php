@extends('layouts.app')
@section('title', 'Task List')

@section('content')
    @forelse ($tasks as $task)
        <a style="display:block" href="{{route('task.show', ['task' => $task->id])}}">{{$task->title}}</a>
    @empty
        <div>Empty list</div>
    @endforelse
    
@endsection
   
