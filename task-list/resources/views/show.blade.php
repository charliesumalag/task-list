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
{{-- <a href="{{route('task.edit')}}"></a> --}}
@endsection
