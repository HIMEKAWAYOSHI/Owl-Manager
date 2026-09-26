<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Owl Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            background:
                
                linear-gradient(10deg, #14151C 0%, #191B26 50%, #1E2130 100%);
            background-attachment: fixed;
            color: #EAEBF2;
            font-family: 'Inter', sans-serif;
            padding: 50px 24px;
        }

        .topbar {
            width: 70%;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
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
            gap: 6px;
        }
        .btn-primary { background: #6E71F0; color: #fff; }
        .btn-primary:hover { background: #5C5FE8; }
        .btn-ghost { background: transparent; color: #9296AA; border: 1px solid rgba(255,255,255,0.12); }
        .btn-ghost:hover { background: rgba(255,255,255,0.06); }
        .btn-danger { background: transparent; color: #F0716A; border: 1px solid rgba(255,255,255,0.12); }
        .btn-danger:hover { background: rgba(240,113,106,0.1); border-color: #F0716A; }
        .btn-success { background: transparent; color: #4ADE80; border: 1px solid rgba(255,255,255,0.12); }
        .btn-success:hover { background: rgba(74,222,128,0.1); border-color: #4ADE80; }
        .btn-sm { padding: 7px 12px; font-size: 13px; border-radius: 6px; }

        .alert {
            width: 70%;
            margin: 0 auto 20px;
            background: rgba(74,222,128,0.1);
            backdrop-filter: blur(10px);
            color: #4ADE80;
            border: 1px solid rgba(74,222,128,0.2);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            text-align: center;
        }

        .card {
            width: 70%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(16px) saturate(160%);
            -webkit-backdrop-filter: blur(16px) saturate(160%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th {
            text-align: center;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #9296AA;
            padding: 12px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        td {
            padding: 14px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            font-size: 14px;
            vertical-align: middle;
            text-align: center;
        }
        tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.12s ease; }
        tbody tr:hover { background: rgba(255,255,255,0.03); }
        .title {
            font-weight: 600;
            max-width: 160px;
            overflow-wrap: break-word;
            word-break: break-word;
        }
        .desc {
            color: #9296AA;
            max-width: 220px;
            white-space: normal;
            overflow-wrap: break-word;
            word-break: break-word;
            line-height: 1.5;
        }

        .badge { display: inline-block; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 999px; }
        .badge-pending { background: rgba(224,166,60,0.15); color: #E0A63C; }
        .badge-completed { background: rgba(74,222,128,0.12); color: #4ADE80; }

        th:last-child, td:last-child { width: 140px; }
        .actions { display: flex; flex-direction: column; gap: 6px; }
        .actions form { margin: 0; }
    </style>
</head>
<body>

    <div class="topbar">
        <div class="brand">OWL MANAGER</div>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Create Task</a>
    </div>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="title">{{ $task->title }}</td>
                       <td class="desc">{{ Str::limit($task->description, 60) }}</td>
                        <td>{{ $task->due_date ? $task->due_date->format('M d, Y') : 'N/A' }}</td>
                        <td>
                            @if ($task->status == 1)
                                <span class="badge badge-pending">Pending</span>
                            @else
                                <span class="badge badge-completed">Completed</span>
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-ghost btn-sm">View</a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-ghost btn-sm">Edit</a>

                                @if ($task->status == 1)
                                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="title" value="{{ $task->title }}">
                                        <input type="hidden" name="description" value="{{ $task->description }}">
                                        <input type="hidden" name="due_date" value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                                        <input type="hidden" name="status" value="0">
                                        <button type="submit" class="btn btn-success btn-sm">Mark Complete</button>
                                    </form>
                                @endif

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>