<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Task Page &mdash; Bootstrap 4 Login Page Snippet</title>
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
                            <form method="POST" class="my-login-validation" novalidate="">
                                <div class="form-group">
                                    <label for="name">Task Name</label>
                                    <input id="name" type="text" class="form-control name taskname" name="name" required autofocus>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Task Description</label>
                                    <input id="description" type="description" class="form-control email description" name="description" required>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="priority">Task Priority</label>


                                    <select name="priority" class=" form-control priority">
                                        <option value="high">High</option>
                                        <option value="critical">Critical</option>
                                        <option value="low">Low</option>
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label for="status">Task Status</label>
                                    <select name="status" class=" form-control status">
                                        <option value="completed">Completed</option>
                                        <option value="pending">Pending</option>
                                    </select>

                                </div>

                        </div>
                    </div>

                    <div class="form-group m-0">
                        <button type="button" class="btn btn-primary btn-block button">
                            Create
                        </button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.button').click(function() {
                var taskname = $('.taskname').val();
                var description = $('.description').val();
                var priority = $('.priority').val();
                var status = $('.status').val();
                let _token = $('meta[name="csrf-token"]').attr('content');
                if (taskname.length == 0) {
                    alert("pleae provide taskname")
                } else if (description.length == 0) {
                    alert("pleae provide description");

                } else {
                    var taskdata = {
                        taskname: taskname,
                        description: description,
                        priority: priority,
                        status: status,
                        _token: _token
                    }
                    console.log('----------------line 23----------,taskdata');
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/taskinsert',
                        data: taskdata,
                        success: function(response) {
                            console.log('--------line 38---------', response)

                            if (response.status == 200) {
                                window.location.href = "/dashboard";
                            } else {
                                window.location.href = "/task";

                            }
                        }

                    })
                }
            })
        })
    </script>

</html>