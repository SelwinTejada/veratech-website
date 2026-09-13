<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Veratech Inc. — I.T. Solutions Provider')</title>
    <meta name="description" content="@yield('description', 'Veratech Inc. — Corporate and commercial reselling, wholesaling, and direct selling of hardware, software and I.T. solutions in the Philippines.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:   { DEFAULT: '#0a1f44', light: '#132a5c', dark: '#061530' },
                        brand:  { DEFAULT: '#f59e0b', light: '#fbbf24', dark: '#d97706' },
                        sky:    { DEFAULT: '#0ea5e9', light: '#38bdf8', dark: '#0284c7' },
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', system-ui, sans-serif; }

        /* ---- Gradient shine button (Uiverse-inspired) ---- */
        .btn-shine {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }
        .btn-shine:hover::before { left: 100%; }
        .btn-shine:hover { transform: translateY(-2px); box-shadow: 0 12px 24px -8px rgba(245,158,11,0.5); }
        .btn-shine:active { transform: translateY(0); }

        /* ---- Glass card ---- */
        .glass-card {
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* ---- 3D tilt card ---- */
        .tilt-card {
            transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.4s ease;
            transform-style: preserve-3d;
        }
        .tilt-card:hover {
            transform: translateY(-8px) rotateX(2deg) rotateY(-2deg);
            box-shadow: 0 24px 48px -12px rgba(10, 31, 68, 0.25);
        }

        /* ---- Animated gradient background ---- */
        .animated-gradient {
            background: linear-gradient(-45deg, #0a1f44, #132a5c, #0ea5e9, #0a1f44);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ---- Floating label input ---- */
        .float-input {
            position: relative;
        }
        .float-input input,
        .float-input textarea,
        .float-input select {
            width: 100%;
            padding: 20px 16px 8px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            background: #ffffff;
            font-size: 15px;
            transition: all 0.25s ease;
            outline: none;
        }
        .float-input input:focus,
        .float-input textarea:focus,
        .float-input select:focus {
            border-color: #0ea5e9;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.12);
        }
        .float-input label {
            position: absolute;
            top: 16px;
            left: 16px;
            color: #64748b;
            font-size: 15px;
            pointer-events: none;
            transition: all 0.2s ease;
            background: transparent;
            padding: 0 4px;
        }
        .float-input input:focus + label,
        .float-input input:not(:placeholder-shown) + label,
        .float-input textarea:focus + label,
        .float-input textarea:not(:placeholder-shown) + label,
        .float-input select:focus + label,
        .float-input select:valid + label {
            top: 6px;
            left: 12px;
            font-size: 11px;
            color: #0ea5e9;
            font-weight: 600;
            background: #ffffff;
        }

        /* ---- Fade-in on scroll ---- */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.7s ease both; }
        .fade-up-delay-1 { animation-delay: 0.15s; }
        .fade-up-delay-2 { animation-delay: 0.3s; }
        .fade-up-delay-3 { animation-delay: 0.45s; }

        /* ---- Logo hover zoom ---- */
        .logo-cell {
            transition: all 0.35s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        .logo-cell img {
            transition: transform 0.35s ease, filter 0.35s ease;
        }
        .logo-cell:hover {
            border-color: #0ea5e9;
            background: linear-gradient(135deg, #ffffff, #f0f9ff);
            transform: translateY(-4px);
            box-shadow: 0 12px 28px -8px rgba(14, 165, 233, 0.35);
        }
        .logo-cell:hover img {
            transform: scale(1.12);
        }

        /* ---- Custom scrollbar ---- */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #0a1f44; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #f59e0b; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    @include('partials.nav')
    @include('partials.flash')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>