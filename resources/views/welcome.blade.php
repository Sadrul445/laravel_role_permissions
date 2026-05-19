<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sample Tracking Management System') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <script src="{{ asset('js/app.js') }}" defer></script>
        @endif
</head>
<body>

<div class="page">

    <!-- ───── Left Panel ───── -->
    <div class="panel-left">
        <!-- Decorative stripes -->
        <div class="streak streak-1"></div>
        <div class="streak streak-2"></div>
        <div class="streak streak-3"></div>
        <div class="glow"></div>

        <!-- Logo -->
        <div class="logo">
            <div class="logo-mark">
                <!-- Asterisk / snowflake icon -->
                {{-- <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round">
                    
                </svg> --}}
                
                <img src="{{ asset('Images/ag-logo.svg') }}" alt="AG Logo" srcset="">
            </div>
            <span class="logo-name">Azim Group</span>
            <p class="hero-sub">
                Knit-Division
            </p>
        </div>

        <!-- Hero copy -->
        <div class="panel-left-body">
            <h1 class="hero-heading">
                Hello<br>
                SAMPLE TRACKING MANAGEMENT SYSTEM!&nbsp;<span class="wave">👋</span>
            </h1>
            <p class="hero-sub">
                All Buyers in One Frame
            </p>

            <div class="features">
                <div class="feature-item">
                    <span class="feature-dot"></span>
                    <span class="feature-text">Automate outreach & follow-ups in minutes</span>
                </div>
                <div class="feature-item">
                    <span class="feature-dot"></span>
                    <span class="feature-text">AI-powered lead scoring & segmentation</span>
                </div>
                <div class="feature-item">
                    <span class="feature-dot"></span>
                    <span class="feature-text">Real-time analytics across every channel</span>
                </div>
                <span>
                        <a href="https://www.linkedin.com/company/azim-group/" target="_blank" style="color:var(--white);text-decoration:none;border-bottom:1.5px solid rgba(255,255,255,.25);transition:border-color .2s;">
                            Learn more about us on LinkedIn
                        </a>
                </span>
            </div>
        </div>

        <div class="panel-left-footer">
            © {{ date('Y') }} Developed by Impressive Digital Communication & Azim Group. All rights reserved.
        </div>
    </div>

    <!-- ───── Right Panel ───── -->
    <div class="panel-right">
        
        <div class="card">
            <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        {{-- @endif --}}
                    @endauth
                </nav>
            @endif
        </header>
            <div class="card-brand">STMS-KNIT</div>

            <h2 class="card-title">Welcome Back!</h2>
            <p class="card-subtitle">
                Don't have an account?
                <a href="{{ route('register') }}">Create a new account now</a>,
                it's FREE! Takes less than a minute.
            </p>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-input"
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                    @error('email')
                        <small style="color:var(--accent);font-size:.8rem;margin-top:5px;display:block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        required
                    >
                    @error('password')
                        <small style="color:var(--accent);font-size:.8rem;margin-top:5px;display:block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="btn-row">
                    <button type="submit" class="btn btn-primary">Login Now</button>

                    <a href="#{{-- {{ route('login.google') ?? '#' }} --}}" class="btn btn-google" style="text-decoration:none;">
                        <!-- Google G icon -->
                        <svg class="google-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Login with Google
                    </a>
                </div>
            </form>

            <div class="forgot-row">
                Forgot password?&nbsp;
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Click here</a>
                @else
                    <a href="#">Click here</a>
                @endif
            </div>
        </div>
    </div>

</div>

</body>
</html>
