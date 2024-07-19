<!-- resources/views/settings.blade.php -->
@extends('layouts.app')

@section('content')
<section class="settings py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Settings</h2>

                        <div class="options">
                            <div class="mb-5">
                                <h3><i class='bx bx-lock'></i> Change Password</h3>
                                <form>
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="new_password">New Password</label>
                                        <input type="password" id="new_password" name="new_password" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="confirm_password">Confirm New Password</label>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Update Password</button>
                                </form>
                            </div>

                            <div class="mb-5">
                                <h3><i class='bx bx-user'></i> Edit Profile</h3>
                                <form>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="profile_picture">Profile Picture</label>
                                        <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
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
