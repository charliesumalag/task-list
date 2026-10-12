@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div>
        <a class="font-medium text-gray-700 underline decoration-pink-500" href="{{route('task.index')}}"><- go back to the task list</a>
    </div>
    @if ($task->description)
        <p class="mb-4 text-slate-700">{{$task->description}}</p>
    @endif
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    
 
    <p class="mb-4 text-sm text-slate-500">Created {{$task->created_at->diffForHumans()}} . Updated {{$task->updated_at->diffForHumans()}}</p>

    @if ($task->completed)
        <span class="font-medium text-green-500">Completed</span>
    @else
        <span class="font-medium text-red-500">Not Completed</span>        
    @endif
    <div class="flex gap-2 items-center mt-2 ">
        <form class=""  method="GET" action="{{ route('task.edit', ['task' => $task->id]) }}">
            @csrf
            <button class="btn" type="submit">Edit</button>
        </form>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete</button>
        </form>
            <form method="POST" action="{{ route('task.toggle-complete', ['task' => $task->id]) }}">
                @csrf
                @method('PUT')
                <button class="btn" type="submit">Mark as {{$task->completed ? 'not complete' : 'completed'}}</button>
            </form>

    </div>
{{-- <a href="{{route('task.edit')}}"></a> --}}
@endsection
