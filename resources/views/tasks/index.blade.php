@extends('layouts.app')

@section('content')
    <div>
        <h1>Your Tasks</h1>
        <p>Manage your personal tasks securely.</p>

        <div>
            <button type="button" onclick="window.location='{{ route('tasks.create') }}'">Create New Task</button>
        </div>

        @if ($tasks->isEmpty())
            <div>No tasks found. Use "Create New Task" to add one.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date->format('Y-m-d') }}</td>
                            <td>
                                <button type="button" onclick="window.location='{{ route('tasks.show', $task) }}'">View</button>
                                <button type="button" onclick="window.location='{{ route('tasks.edit', $task) }}'">Edit</button>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
