@extends('layouts.app')

@section('content')
    <div>
        <h1>Login</h1>
        <p>Enter your credentials to access your task list.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <button type="submit">Login</button>
                <a href="{{ route('register') }}">Create an account</a>
            </div>
        </form>
    </div>
@endsection
