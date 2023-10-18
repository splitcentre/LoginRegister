<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extend('auth.layouts')

    @section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="class-body">
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success">{{$message}}</div>
                    @else
                    <div class="alert alert-success">You Logged in!!!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endsection
</body>
</html>