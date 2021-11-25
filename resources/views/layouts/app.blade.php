<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <meta name="theme-color" content="#ff00d6">
    <meta property="og:image" content="https://ytdownloader.dbapi.org/assets/img/youtube.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description"
        content="Download YouTube videos in MP4 and MP3 formats easily without ads and for free.">
    <meta name="description"
        content="Download YouTube videos in MP4 and MP3 formats easily without ads and for free.Download YouTube videos in MP4 and MP3 formats easily without ads and for free.">
    <meta property="og:type" content="website">
    <meta name="twitter:title" content="{{ config('app.name') }} Downloader">
    <meta name="twitter:image" content="https://ytdownloader.dbapi.org/assets/img/youtube.png">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/icons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="180x180" href="/assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/assets/img/icons/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/zephyr/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script src="{{ mix('js/app.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

<body>
    @include('partials.header')
    <div class="container">
        @yield('content')
        @include('partials.footer')
    </div>

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
