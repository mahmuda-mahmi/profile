<!DOCTYPE html>
<html lang="en" data-theme="silk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    
    {{-- Dynamic title --}}
    <title>{{ isset($title) ? $title . ' - Profile' : 'Profile' }}</title>
    
    {{-- Fonts --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <header>
        @include('components.nav')
    </header>

    <main class="flex-1 container mx-auto">
        {{ $slot }}
    </main>

    <footer class="footer footer-center bg-base-300 text-base-content p-4">
        <aside>
            <p>Copyright © {{ date('Y') }}. All rights reserved.</p>
        </aside>
    </footer>
</body>