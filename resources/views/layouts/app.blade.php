<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <!-- Add your CSS links or stylesheets here -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('settings') }}">Settings</a></li>
                <!-- Add more navbar links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Add your JavaScript links or scripts here -->
</body>
</html>
