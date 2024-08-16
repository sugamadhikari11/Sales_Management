@extends("layouts.default")
@section("title","login")
@section("content")
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