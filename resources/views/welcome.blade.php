<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kontoret | Welcome</title>
        <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background-image: url('{{ asset('images/modern_bg.png') }}');
                background-size: cover;
                background-position: center;
            }
            .hero-card {
                max-width: 600px;
                width: 90%;
            }
            .hero-logo {
                height: 80px;
                margin-bottom: 24px;
            }
            .hero-title {
                font-size: 3rem;
                margin-bottom: 16px;
                letter-spacing: -1px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
            <div class="glass-card hero-card" style="text-align: center; padding: 60px;">
            <img src="{{ asset('images/mainlogo_medium.png') }}" alt="Logo" class="hero-logo">
            <h1 class="hero-title">Kontoret</h1>
            <p style="margin-bottom: 32px;">The modern, no-build administration framework for your business needs.</p>
            
            <div style="display: flex; gap: 16px; justify-content: center;">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/') }}" class="btn btn-blue">Enter Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-blue">Sign In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-ghost">Create Account</a>
                        @endif
                    @endauth
                @endif
                <a href="https://laravel.com/docs" class="btn btn-ghost" target="_blank">Documentation</a>
            </div>
            </div>
        </div>
    </body>
</html>
