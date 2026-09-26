<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $task->title }} - Owl Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(10deg, #14151C 0%, #191B26 50%, #1E2130 100%);
            background-attachment: fixed;
            color: #EAEBF2;
            font-family: 'Inter', sans-serif;
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
            padding: 28px;
        }

        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 22px;
            margin: 0 0 16px;
        }

        .field { margin-bottom: 16px; }
        .label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #9296AA;
            margin-bottom: 4px;
        }
        .value {
            font-size: 15px;
            line-height: 1.5;
            overflow-wrap: break-word;
        }

        .badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 999px;
        }
        .badge-pending { background: rgba(224,166,60,0.15); color: #E0A63C; }
        .badge-completed { background: rgba(74,222,128,0.12); color: #4ADE80; }

        .actions { margin-top: 24px; text-align: center; }
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
        .btn-ghost { background: transparent; color: #9296AA; border: 1px solid rgba(255,255,255,0.12); }
        .btn-ghost:hover { background: rgba(255,255,255,0.06); }
    </style>
</head>
<body>

    <div class="card">
        <center>
        <h1>{{ $task->title }}</h1>
        </center> 
        <div class="field">
            <div class="label">Description</div>
            <div class="value">{{ $task->description }}</div>
        </div>

        <div class="field">
            <div class="label">Due Date</div>
            <div class="value">{{ $task->due_date ? $task->due_date->format('M d, Y') : 'N/A' }}</div>
        </div>

        <div class="field">
            <div class="label">Status</div>
            <div class="value">
                @if ($task->status == 1)
                    <span class="badge badge-pending">Pending</span>
                @else
                    <span class="badge badge-completed">Completed</span>
                @endif
            </div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('tasks.index') }}" class="btn btn-ghost">Back</a>
    </div>

</body>
</html>