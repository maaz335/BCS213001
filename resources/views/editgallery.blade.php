@include('layouts.adminheader')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery Item</title>
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
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4 text-light" style="margin-left: 38px;">Edit Gallery Item</h2>
                <form action="{{ route('update.gallery', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="photo" class="form-label text-light">Update File</label>
                        @if($gallery->file_name)
                            <img src="{{ asset('storage/'.$gallery->file_name) }}" alt="Current Image" style="max-width: 300px; max-height: 300px;margin-left: 12PX;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="delete_image" name="delete_image">
                                <label class="form-check-label" for="delete_image">
                                    Delete Current Image
                                </label>
                            </div>
                        @endif
                        <input type="file" name="photo" class="form-control mt-2">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label text-light">Update Price</label>
                        <input type="text" name="price" class="form-control" value="{{ $gallery->price }}">
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btn-block" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
