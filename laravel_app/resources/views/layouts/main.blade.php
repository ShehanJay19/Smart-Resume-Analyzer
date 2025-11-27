<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Resume Analyzer</title>
    @if (file_exists(public_path('build/manifest.json')))
    @vite('resources/js/app.js')
@else
    <!-- Vite manifest not found — using Tailwind CDN fallback for development -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.7/dist/tailwind.min.css" rel="stylesheet">
    <script type="module" src="{{ asset('resources/js/app.js') }}"></script>
@endif
</head>
<body class="bg-gray-100 text-gray-900">
<div class="container mx-auto py-8">
    @yield('content')
</div>
</body>
</html>
