<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1666649507247-6226902955c2?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
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

        .main {
            position: relative;
            z-index: 1;
        }

        .gallery-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    @include('layouts.adminheader')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4 text-light">Upload New Gallery</h2>
                <form action="{{ route('add.gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="photo" class="form-label text-light">Upload File</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label text-light">Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btn-block" value="Upload">
                    </div>
                </form>
                @if(session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div><br>
        <div class="row">
            @foreach($gallerys as $gallery)
                @if($gallery)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/'.$gallery->file_name) }}" alt="" class="card-img-top gallery-image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallery->price }}</h5>
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('delete.gallery', $gallery->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('edit.gallery', $gallery->id) }}" class="btn btn-warning btn-sm">Update</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
