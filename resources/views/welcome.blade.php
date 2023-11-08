<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{ config('app.name', 'Laravel') }}</title>
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  
    <!-- Scripts -->
    <!-- Harus Export Script ini untuk akses css Bootstrapnya  -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  
    <style type="text/css">
        i{
            font-size: 50px;
        }
    </style>
</head>
<body>
    <div id="app">
  
        <main class="section-dashboard">
            <div class="head-dashboard">
                <h1>Task Management Urang</h1>
                <p>"Urang Task Management" adalah aplikasi manajemen tugas yang revolusioner yang diciptakan dengan semangat untuk membantu Anda menghadapi tugas-tugas sehari-hari dengan cepat dan efisien. "Urang" adalah kata dalam bahasa Sunda yang berarti "kita" atau "kami," dan itulah inti dari aplikasi ini: membantu kita semua mengelola tugas-tugas kita dengan lebih baik.</p>
                <a href="{{route('home')}}">Lest Go</a>
            </div>
            <img src="/image/ilustrasi.png" alt="">
        </main>
    </div>
</body>
</html>