<!DOCTYPE html>
<html>
<head>
    <title>My To-Do List</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; }
        .task { padding: 10px; border-bottom: 1px solid #ddd; }
        .completed { text-decoration: line-through; color: gray; }
        button { margin-left: 10px; }
    </style>
</head>
<body>
    <h1>My Tasks</h1>

    <p>Welcome!</p>

    <!-- Create Task Button -->
    <a href="{{ route('tasks.create') }}">
        <button>+ Create New Task</button>
    </a>

    <!-- Tasks List -->
    <h2>Your Tasks:</h2>
    
    @forelse($tasks as $task)
        <div class="task">
            <strong>{{ $task->title }}</strong> 
            (Due: {{ $task->due_date }})

            <a href="{{ route('tasks.edit', $task->id) }}">
                <button>Edit</button>
            </a>
            
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this task?')">Delete</button>
            </form>

            @if($task->description)
                <br><small>{{ $task->description }}</small>
            @endif
        </div>
    @empty
        <p>No tasks yet! Create your first task above.</p>
    @endforelse
</body>
</html>