<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <link href="{{ asset('admin-style/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-style/css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <form 
         action="{{ url('/admin/login') }}" 
         method="post"
         class="login-box bg-light rounded">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" class="form-control">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Login</button>      
        </form>
    </div>

    <script src="{{ asset('admin-style/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>