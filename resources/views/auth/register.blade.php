@extends('layouts.app')

@section('content')
    <div>
        <h1>Register</h1>
        <p>Create a secure account to manage your tasks.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="full_name">Full Name</label>
                <input id="full_name" name="full_name" value="{{ old('full_name') }}" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Register</button>
                <a href="{{ route('login') }}">Already have an account?</a>
            </div>
        </form>
    </div>
@endsection
