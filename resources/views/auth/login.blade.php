<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="margin-top: 150px;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center text-uppercase text-italice">User Login</h5>
                    </div>
                    <div class="card-body">
                        <form onsubmit="formSubmit(event)">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username/Email</label>
                                <input type="text" name="username" class="form-control shadow-none" id="username" placeholder="Enter Username/Email" autocomplete="off" />
                                <span class="error-username error text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control shadow-none" id="password" placeholder="Enter Password" autocomplete="off" />
                                <span class="error-password error text-danger"></span>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-success shadow-none px-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function formSubmit(event) {
            event.preventDefault();
            var formdata = new FormData(event.target)
            $.ajax({
                url: "/login",
                method: "POST",
                contentType: false,
                processData: false,
                data: formdata,
                beforeSend: () => {

                },
                success: res => {
                    if (res.status == 'error') {
                        $.each(res.message, (index, value) => {
                            $("form").find(".error-" + index).text(value);
                        })
                        return
                    }
                    location.href = "/home";
                }
            })
        }
    </script>
</body>

</html>