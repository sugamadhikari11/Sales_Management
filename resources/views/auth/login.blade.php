<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form id="loginForm">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="handleLogin()">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div id="error-message" class="text-danger text-center mt-3" style="display:none;">
                            Invalid email or password
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleLogin() {
        // Hardcoded credentials
        var correctEmail = 'admin@example.com';
        var correctPassword = 'password';

        // Get user input
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Check credentials
        if (email === correctEmail && password === correctPassword) {
            // Store a flag in localStorage to simulate login state
            localStorage.setItem('loggedIn', 'true');
            // Redirect to the home page
            window.location.href = "{{ route('home') }}";
        } else {
            // Show error message
            document.getElementById('error-message').style.display = 'block';
        }
    }
</script>
@endsection
