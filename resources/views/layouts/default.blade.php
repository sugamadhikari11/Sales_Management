<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Georgia Pro Light';
            src: url("{{ asset('public/fonts/GeorgiaPro-Light.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body, div, header, li, a, ul, span, button, main, i {
            font-family: 'Georgia Pro Light', serif;
        }

        .navbar {
            border-radius: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            background-color: #0E73DB;
            color: #fff;
            border-radius: 5px;
        }

        .navbar-nav-center {
            margin: 0 auto;
        }

        .navbar-toggler {
            border-color: #0E73DB;
        }

        .navbar-toggler:focus {
            outline: none;
        }
    </style>

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="light-mode">
        <!-- Conditionally render the navbar -->
        @if (!Route::is('login') && !Route::is('register') && !Route::is('password.request') && !Route::is('password.reset'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <span class="name">Sales Management</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-nav-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class='bx bx-home-alt icon'></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class='bx bx-package icon'></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.index') }}">
                            <i class='bx bx-user icon'></i> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report.index')}}">
                            <i class='bx bx-file icon'></i> Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stock.index')}}">
                            <i class='bx bx-line-chart icon'></i> Stock
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}">
                            <i class='bx bx-cog icon'></i> Settings
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out icon'></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @endif
    </div>

    <main class="container mt-4">
        @yield('content')
    </main>

        <script>
        // Redirect to login if back button is used after logout
        window.addEventListener('pageshow', function(event) {
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                // Redirect to login if the user is not authenticated
                if (!{{ auth()->check() ? 'true' : 'false' }}) {
                    window.location.href = "{{ route('login') }}";
                }
            }
        });
    </script>


    <!-- JavaScript to Handle Sidebar Toggle and Dark Mode -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
