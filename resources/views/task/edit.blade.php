<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task - Owl Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            background:
                
                linear-gradient(160deg, #14151C 0%, #191B26 50%, #1E2130 100%);
            background-attachment: fixed;
            color: #EAEBF2;
            font-family: 'Inter', sans-serif;
            padding: 50px 24px;
            text-align: center;
        }

        .header {
            margin-bottom: 30px;
        }
        .header h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 26px;
            margin: 0;
        }

        .card {
            width: 400px;
            margin: 0 auto;
            text-align: left;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(16px) saturate(160%);
            -webkit-backdrop-filter: blur(16px) saturate(160%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            border-radius: 12px;
            padding: 24px;
        }

        .field { margin-bottom: 18px; }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 13px;
            color: #9296AA;
        }

        input[type="text"],
        textarea,
        input[type="date"],
        select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.05);
            color: #EAEBF2;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
        }
        select option {
            background: #1E2130;
            color: #EAEBF2;
        }

        textarea { resize: vertical; max-height: 300px; overflow-y: auto; }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #6E71F0;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 24px;
        }

        .btn {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 14px;
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-primary { background: #6E71F0; color: #fff; }
        .btn-primary:hover { background: #5C5FE8; }
        .btn-ghost { background: transparent; color: #9296AA; border: 1px solid rgba(255,255,255,0.12); }
        .btn-ghost:hover { background: rgba(255,255,255,0.06); }

        .error {
            color: #F0716A;
            font-size: 13px;
            margin-top: 4px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Edit Task</h1>
    </div>

    <div class="card">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
            </div>

            <div class="field">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Pending</option>
                    <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="actions">
                <a href="{{ route('tasks.index') }}" class="btn btn-ghost">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>

</body>
</html>