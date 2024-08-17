@extends("layouts.default")
@section("title","login")
@section("content")

<style>
    @font-face {
            font-family: 'Georgia Pro Light';
            src: url("{{ asset('public/fonts/GeorgiaPro-Light.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body, div, p, form, button {
            font-family: 'Georgia Pro Light', serif;
        }
</style>

<div>
    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <p>Thanks for signing up! Before getting started, please verify your email by clicking on the link we just emailed to you.</p>

    <form action="{{ route('verification.resend') }}" method="POST">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</div>
@endsection