<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #333;
            padding: 1rem 2rem;
            border-bottom: 1px solid #444;
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-link {
            color: #fff;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #ccc;
        }

        .slider-content {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Johnsons.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item active">
                    <a class="nav-link" href="/userdashboard">NFT Info<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="register">Register</a>
                </li>
                @endguest
                @auth
                <li class="nav-item active">
                    <a class="nav-link" href="/userdashboard">NFT Info<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/usergallery">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <div>  {{ Auth::user()->name }} </div>
                    </a>
                </li>
                <li class="nav-item" >
                <div class="slider-content" style="margin-left: 29px;margin-top: 8px;">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</body>
</html>
