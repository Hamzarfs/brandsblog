<!-- resources/views/site/common.blade.php -->
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="@yield('meta_desc')" />

    <link rel="canonical" href="{{ url()->current() }}" />

    <link rel="icon" type="image/webp" href="{{ asset('rfs-fav.webp') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@200;400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Add your CSS links here -->

    {{-- @stack('headerStyles') --}}


    <style>
        /* Custom scrollbar styles */
        ::-webkit-scrollbar {
            width: 8px;
            /* Width of the scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: white;
            /* White background */
        }

        ::-webkit-scrollbar-thumb {
            background: #666BC0;
            /* Purple scrollbar */
            border-radius: 8px;
            /* Rounded corners */
            position: relative;
        }

        ::-webkit-scrollbar-thumb::before {
            content: 'VIP';
            position: absolute;
            top: 50%;
            right: -50px;
            transform: rotate(270deg) translateY(-50%);
            transform-origin: center;
            background-color: red;
            /* Red VIP tag background */
            color: white;
            /* White text color */
            padding: 5px 10px;
            font-weight: bold;
            border-radius: 5px 5px 0 0;
        }
    </style>
</head>


<body>
    @yield('content')

    <!-- Add your JS scripts here -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- STart JS FOR OWL TESTIMONIAL CAROUSEL --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>
