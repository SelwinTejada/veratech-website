<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin — Veratech')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">
<div class="min-h-screen flex">
    <aside class="w-64 bg-slate-900 text-slate-300 flex-shrink-0 hidden md:flex flex-col">
 <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-800">
    <span class="inline-flex h-9 w-9 rounded-lg bg-white overflow-hidden items-center justify-center">
        <img src="{{ asset('images/veratech-logo.jpg') }}"
             alt="Veratech"
             class="h-full w-full object-contain p-0.5">
    </span>
    <div class="text-white font-bold text-sm">
        Veratech <span class="text-slate-400 font-medium">Admin</span>
    </div>
</div>
        <nav class="flex-1 p-4 space-y-1 text-sm">
            @php
                $items = [
                    ['Dashboard', 'admin.dashboard'],
                    ['Users', 'admin.users.index'],
                    ['Brands', 'admin.brands.index'],
                    ['Solutions', 'admin.solutions.index'],
                    ['Industries', 'admin.industries.index'],
                    ['Products', 'admin.products.index'],
                    ['Careers', 'admin.careers.index'],
                    ['Applications', 'admin.career-applications.index'],
                    ['Articles', 'admin.articles.index'],
                    ['Quotes', 'admin.quotes.index'],
                    ['Contact Messages', 'admin.contact-messages.index'],
                    ['Media', 'admin.media.index'],
                    ['Company Info', 'admin.company-info.edit'],
                    ['Audit Logs', 'admin.audit-logs.index'],
                ];
            @endphp
            @foreach ($items as [$label, $route])
                <a href="{{ route($route) }}" class="block px-3 py-2 rounded {{ request()->routeIs($route) ? 'bg-sky-600 text-white' : 'hover:bg-slate-800' }}">{{ $label }}</a>
            @endforeach
        </nav>
        <form method="POST" action="{{ route('admin.logout') }}" class="p-4 border-t border-slate-800">
            @csrf
            <button class="w-full text-left px-3 py-2 rounded hover:bg-slate-800 text-sm">Sign out</button>
        </form>
    </aside>
    <div class="flex-1 flex flex-col">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6">
            <div class="font-semibold">@yield('page_title', 'Dashboard')</div>
            <div class="text-sm text-slate-600">{{ auth()->user()->name }}</div>
        </header>
        <main class="p-6">
            @include('partials.flash')
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>