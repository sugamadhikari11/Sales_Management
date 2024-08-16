@extends('layouts.default')

@section('content')
<section class="settings py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Settings</h2>

                        <!-- Display status message -->
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <!-- Change Password Form -->
                        <div class="options">
                            <div class="mb-5">
                                <h3><i class='bx bx-lock'></i> Change Password</h3>
                                <form action="{{ route('settings.update-password') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="new_password">New Password</label>
                                        <input type="password" id="new_password" name="new_password" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="new_password_confirmation">Confirm New Password</label>
                                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for settings page -->
<style>
    @font-face {
        font-family: 'Georgia Pro Light';
        src: url("{{ asset('public/fonts/GeorgiaPro-Light.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    section, div, h2, h3, form, button, label, input {
        font-family: 'Georgia Pro Light', serif;
    }

    .settings .card {
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .settings .card-title {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .settings .form-group label {
        font-weight: bold;
    }

    .settings .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .settings .btn-primary:hover {
        background-color: #0056b3;
    }

    .settings h3 {
        display: flex;
        align-items: center;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .settings h3 i {
        margin-right: 0.5rem;
        font-size: 1.5rem;
    }
</style>
@endsection
