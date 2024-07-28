@extends('layouts.app')

@section('content')
<section class="home py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Welcome to the Home Page</h1>
                <h6 class="lead">This is the home page of your Laravel application. Use this space to provide some information or a brief introduction.</h6>
                <a href="{{ url('/settings') }}" class="btn btn-main btn-lg mt-3">Go to Settings</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Shortcut 1</h5>
                        <p class="card-text">Description for shortcut 1.</p>
                        <a href="{{ url('/shortcut1') }}" class="btn btn-card">Go to Shortcut 1</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Shortcut 2</h5>
                        <p class="card-text">Description for shortcut 2.</p>
                        <a href="{{ url('/shortcut2') }}" class="btn btn-card">Go to Shortcut 2</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Shortcut 3</h5>
                        <p class="card-text">Description for shortcut 3.</p>
                        <a href="{{ url('/shortcut3') }}" class="btn btn-card">Go to Shortcut 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.card-title {
    font-weight: bold;
}

.card-text {
    color: #333;
}

.btn-main {
    background-color: #0E73DB;
    color: #fff;
}

.btn-card {
    background-color: #0E73DB;
    color: #fff;
}

.dark-mode .home h1, .dark-mode .home h6, .dark-mode .home a {
    color: #fff !important;
}

.dark-mode .btn-main, .dark-mode .btn-card {
    background-color: #EDB50D;
    color: #fff;
}
</style>
@endsection
