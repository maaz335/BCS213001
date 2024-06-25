@include('layouts.header')<br><br><br><br><br><br>
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
    </style>
</head>
<body>
    
<main class="main" style="text-align: center;">
    <section id="intro">
        <h1>Welcome to Our Website</h1>
        <p>Discover the best of our services and products.</p>
    </section>

    <section id="about">
        <h2>About Us</h2>
        <p>We are a company dedicated to providing top-notch services and products.</p>
    </section>

    <section id="contact">
        <h2>Contact Us</h2>
        <p>Email us at info@example.com or call us at (123) 456-7890.</p>
    </section>
</main>

</body>
</html>

<br><br><br><br><br><br><br><br>
@include('layouts.footer')
