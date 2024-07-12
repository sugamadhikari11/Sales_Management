<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<section class="home py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Welcome to the Home Page</h1>
                <p class="lead">This is the home page of your Laravel application. Use this space to provide some information or a brief introduction.</p>
                <a href="{{ url('/settings') }}" class="btn btn-primary btn-lg mt-3">Go to Settings</a>
            </div>
        </div>
    </div>
</section>
@endsection
