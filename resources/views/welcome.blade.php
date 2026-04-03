@extends('layouts.app')

@section('content')
    <div>
        <h2>Welcome</h2>
        <p>This app lets you register, log in, and manage your tasks.</p>
        <p>
            <button type="button" onclick="window.location='{{ route('register') }}'">Register</button>
            <button type="button" onclick="window.location='{{ route('login') }}'">Login</button>
        </p>
    </div>
@endsection
