<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Veratech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen grid place-items-center bg-slate-100">
    <div class="w-full max-w-sm bg-white rounded-2xl shadow-lg p-8 border border-slate-200">
  <div class="flex items-center gap-3">
    <span class="inline-flex h-12 w-12 rounded-xl bg-white border border-slate-200 overflow-hidden items-center justify-center">
        <img src="{{ asset('images/veratech-logo.jpg') }}" alt="Veratech" class="h-full w-full object-contain p-0.5">
    </span>
    <h1 class="text-xl font-bold">Veratech Admin</h1>
</div>
        <p class="text-sm text-slate-500 mt-1">Sign in to continue</p>

        @if ($errors->any())
            <div class="mt-4 rounded-md bg-rose-50 border border-rose-200 text-rose-700 text-sm px-3 py-2">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="mt-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-1 w-full rounded-md border-slate-300">
            </div>
            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" required class="mt-1 w-full rounded-md border-slate-300">
            </div>
            <label class="inline-flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" value="1" class="rounded border-slate-300"> Remember me
            </label>
            <button type="submit" class="w-full py-2.5 rounded-md bg-sky-600 text-white font-semibold hover:bg-sky-700">Sign in</button>
        </form>
    </div>
</body>
</html>