<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Task Management System' }}</title>
    </head>
    <body>
        <header>
            <h1>Task Management System</h1>
            <nav>
                <button type="button" onclick="window.location='{{ route('home') }}'">Home</button>
                @auth
                    <span>Hi, {{ auth()->user()->full_name }}</span>
                    <button type="button" onclick="window.location='{{ route('tasks.index') }}'">My Tasks</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <button type="button" onclick="window.location='{{ route('login') }}'">Login</button>
                    <button type="button" onclick="window.location='{{ route('register') }}'">Register</button>
                @endauth
            </nav>
        </header>

        <main>
            @if (session('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </body>
</html>
