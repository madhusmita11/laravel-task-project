<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">

</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">

                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Task </h4>
                            <form action="/edit/<?php echo $task[0]->id; ?>" method="post" class="my-login-validation" novalidate="">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group">
                                    <label for="name">Task Name</label>
                                    <input id="name" type="text" class="form-control name taskname" name="taskname" required autofocus value='<?php echo $task[0]->taskname; ?>'>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Task Description</label>
                                    <input id="description" type="description" class="form-control email description" name="description" required value='<?php echo $task[0]->description; ?>'>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="priority">Task Priority</label>


                                    <select name="priority" class=" form-control priority">
                                        <option value="high" {{ $task[0]->priority == "high" ? 'selected' : ''}}>High</option>
                                        <option value="critical" {{ $task[0]->priority == "critical" ? 'selected' : ''}}>Critical</option>
                                        <option value="low" {{ $task[0]->priority == "low" ? "selected" : "" }}>Low</option>
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label for="status">Task Status</label>
                                    <select name="status" class=" form-control status">
                                        <option value="completed" {{$task[0]->status == "completed" ? 'selected' : ''}}>Completed</option>
                                        <option value="pending" {{$task[0]->status == "Pending" ? 'selected' : ''}}>Pending</option>
                                    </select>

                                </div>

                        </div>
                    </div>

                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary btn-block button">
                            Update Task
                        </button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

</html>