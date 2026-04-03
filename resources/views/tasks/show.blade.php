@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ $task->title }}</h1>
        <p>Task details.</p>
        <div>
            <button type="button" onclick="window.location='{{ route('tasks.index') }}'">Back</button>
            <button type="button" onclick="window.location='{{ route('tasks.edit', $task) }}'">Edit</button>
        </div>

        <div>
            <strong>Description</strong>
            <p>{{ $task->description }}</p>
        </div>

        <div>
            <p><strong>Due Date</strong></p>
            <p>{{ $task->due_date->format('Y-m-d') }}</p>
        </div>
    </div>
@endsection
