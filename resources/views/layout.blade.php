<!DOCTYPE html>
<html lang="ar" dir='rtl'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <title>خدمة الفحص الفني الدوري | مركز سلامة المركبات</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="banner">
        منصة حجز مواعيد الفخص الفني الدوري الجديدة جرب الأن ←
    </div>

    <header>
        <div class="header">
            <div>
                <div>
                    <img src="/logo.svg" alt="الرئيسية">
                </div>
                <p class="service_text">
                    خدمة الفحص الفني الدوري
                </p>
            </div>

            <div class="search">
                <div>
                    <p> English </p>
                </div>
                <div>
                    <x-fas-search />
                    <input type="search" name="text" id="text" placeholder="بحث">
                </div>
            </div>
        </div>

    </header>


    @include('nav')
    @yield('content')
    @include('footer')

</body>

</html>
