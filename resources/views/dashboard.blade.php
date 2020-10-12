
 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
    <style>
th {
  background-color: #007bff;
  color: white;
}

    </style>
 </head>

 <body>
    <table border=1 style="width:50%">
       <tr>
          <th>Sl No</th>
          <th>Task Name</th>
          <th>Task Description</th>
          <th>Task Priority </th>
          <th>Task Status</th>
          <th>Delete</th>
          <th>Update</th>
       </tr>
       @foreach ($tasks as $inx=>$task)
       <tr>
          <td>{{ $inx+1 }}</td>
          <td>{{ $task->taskname }}</td>
          <td>{{ $task->description }}</td>
          <td>{{ $task->priority }}</td>
          <td>{{ $task->status }}</td>
          <td><a href='delete/{{ $task->id }}'>Delete</a></td>
          <td><a href='edit/{{ $task->id }}'>Edit</a></td>
       </tr>
       @endforeach
    </table>
    <div class="mt-4 text-center">
									Create  New Task <a link href="task">Creat</a>
								</div>
                        <div class="mt-4 text-center">
                        <a href="logout">Log out</a>
                        </div>
 </body>
 </html>