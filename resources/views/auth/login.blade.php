<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kontoret | Login</title>
        <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    </head>
    <body class="antialiased">
        <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
            <div class="glass-card content-wrapper" style="width: 100%; max-width: 440px; padding: 48px; text-align: center;">
            <div style="margin-bottom: 32px;">
                <img src="{{ asset('images/mainlogo_medium.png') }}" alt="Logo" style="height: 60px; margin-bottom: 24px; filter: drop-shadow(0 0 12px rgba(99, 102, 241, 0.4));">
                <h1 style="font-size: 2.2rem; font-weight: 700; margin: 0; background: linear-gradient(135deg, #fff 30%, #a5b4fc 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Kontoret Admin</h1>
                <p style="color: var(--text-secondary); margin-top: 8px;">Secure access for administration personnel</p>
            </div>

            <div style="display: flex; flex-direction: column; gap: 20px;">
                <a href="{{ route('auth.google') }}" class="btn btn-blue" style="height: 56px; font-size: 1.05rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="currentColor"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="currentColor" fill-opacity="0.8"/>
                    </svg>
                    Continue with Google
                </a>

                <div style="display: flex; align-items: center; gap: 16px; margin: 8px 0;">
                    <div style="flex: 1; height: 1px; background: var(--glass-border);"></div>
                    <span style="font-size: 0.75rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 2px; font-weight: 600;">Security Protocol</span>
                    <div style="flex: 1; height: 1px; background: var(--glass-border);"></div>
                </div>
                
                <p style="font-size: 0.85rem; color: var(--text-secondary); line-height: 1.6;">
                    Authorized personnel only. All access attempts are recorded.
                </p>
            </div>
            
            <div style="margin-top: 40px; padding-top: 24px; border-top: 1px solid var(--glass-border);">
                <a href="/" style="color: var(--text-secondary); text-decoration: none; font-size: 0.9rem; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px;">
                    <span class="material-symbols-outlined" style="font-size: 18px;">arrow_back</span>
                    Return Home
                </a>
            </div>
            </div>
        </div>
    </body>
</html>
