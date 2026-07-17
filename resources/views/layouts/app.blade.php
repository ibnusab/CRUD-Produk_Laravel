<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background:#f5f6fa;
        }

        .sidebar{
            width:260px;
            min-height:100vh;
            background:#212529;
        }

        .sidebar .nav-link{
            color:#ced4da;
            padding:12px 18px;
            border-radius:8px;
            margin-bottom:5px;
        }

        .sidebar .nav-link:hover{
            background:#0d6efd;
            color:white;
        }

        .content{
            margin-left:260px;
        }

        .navbar-custom{
            background:white;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .card-dashboard{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .sidebar .nav-link.active{
    background:#0d6efd;
    color:#fff;
    font-weight:600;
}

.sidebar .nav-link i{
    width:20px;
}
    </style>

</head>
<body>

<div class="d-flex">

    @include('layouts.sidebar')

    <div class="content flex-grow-1">

        @include('layouts.navbar')

        <div class="container-fluid mt-4">

            @yield('content')

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>