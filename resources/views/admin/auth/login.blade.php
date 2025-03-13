<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        @livewireStyles
        <script src="{{ asset('public/js/app.js') }}"></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 lg:w-1/3">
                @if ($errors->any())
                    <x-blocks.alert type="danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-blocks.alert>
                @endif
                <div class="flex justify-center pt-8 sm:pt-0">
                    <img src="{{asset('img/logo.png')}}" width="200"/>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1">
                        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <form method="POST" action="{{route('admin.auth.login')}}">
                                @csrf
                                <x-blocks.input-field name="email" type="email" label="Email" value="{{ old('email') }}"/>
                                <x-blocks.input-password-field name="password" label="Password"/>
                                <x-blocks.toggle name="remember" label="Remember Me?" is-checked="{{ old('remember') }}"/>
                                <x-blocks.button label="Login" full-width type="submit"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
