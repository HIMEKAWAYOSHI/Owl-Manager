<h1><center>Owl TaskManager</center></h1>

<h2>Project Code</h2> 
WST21-PM-2026-SF

<h2>Student Name</h2> 
Buhangin, Rhaneil S.

<h2>Course & Year</h2> 
BSIT 2nd Year

<h2>Database Used</h2>
MySQL

<h2>Features:</h2>
 
 - Add Task
 - View Tasks
 - Edit Task
 - Delete Task
 - Update Status

<h1>Structure of the website</h1>

```
WST3/TaskManager
├── app/
│   ├── Http/Controllers/
│   │   └── TaskController.php
│   └── Models/
│       └── Task.php
├── database/
│   └── migrations/
│       ├── ..._create_tasks_table.php
│       └── ..._change_description_to_text...php
├── resources/
│   └── views/
│       └── task/
│           ├── main.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
└── routes/
    └── web.php
```

<h2>Output of the website</h2>

<h3>MainDashboard</h3>

![Dashboard](docs/Dash.png)

<h3>Create Task</h3>

![Create Task](docs/CreateTask.png)

<h3>Edit Task</h3>

![Edit Task](docs/EditTask.png)

<h3>View Task</h3>

![View Task](docs/ViewTask.png)
