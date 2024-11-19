<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BladeBazaar - Admin Panel</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Vite -->
    <link rel="preload" as="style" href="http://127.0.0.1:8000/build/assets/app-CU11jDOT.css" />
    <link rel="modulepreload" href="http://127.0.0.1:8000/build/assets/app-z8A_VDJZ.js" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/build/assets/app-CU11jDOT.css" />
    <script type="module" src="http://127.0.0.1:8000/build/assets/app-z8A_VDJZ.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS to ensure footer is always at the bottom -->
    <style>
        html,
        body {
            height: 100%;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        .main-content {
            flex: 1;
        }

        footer {
            background-color: #111;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>

<body class="font-sans antialiased bg-light">

    <div class="content-wrapper">
        <!-- Admin Header -->
        @include('partials.admin-header')

        <!-- Main Content -->
        <div class="container-fluid main-content">
            <div class="row">


                <!-- Content Section -->
                <main class="col-md-9 col-lg-10 p-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- Admin Footer -->
        @include('partials.admin-footer')

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>