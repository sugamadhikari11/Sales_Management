<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Your App!</h1>
        <p class="lead">This is the home page content.</p>
        <hr class="my-4">
        <p>More information or additional content can go here.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('settings') }}" role="button">Go to Settings</a>
    </div>
@endsection
