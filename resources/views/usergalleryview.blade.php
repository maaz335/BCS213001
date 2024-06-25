@include('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1666649507247-6226902955c2?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            color: black; /* Set text color to black */
        }

        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5); /* White overlay with 50% opacity */
            pointer-events: none; /* Allow interaction with elements underneath */
            z-index: -1; /* Ensure the overlay is behind all content */
        }

        .gallery-image {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-weight: bold;
        }
    </style>
</head>
<body>
<main>
<div class="container mt-5">
        @if(session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="text-center mb-5">User Gallery</h1>
        <div class="row">
            @foreach($gallerys as $gallery)
                @if($gallery)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/'.$gallery->file_name) }}" alt="" class="card-img-top gallery-image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallery->price }}</h5>
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('purchase.gallery', $gallery->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Purchase</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</main>

    @include('layouts.footer')
</body>
</html>
