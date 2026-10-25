<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Jelajah Wisata' }}</title>
    <link rel="icon" href="{{ url('public/user/assets/img/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ url('public/user/assets/img/apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ url('public/user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/assets/css/main.css') }}" rel="stylesheet">
    <style>
        .travel-card { height: 100%; overflow: hidden; border: 1px solid #e8edf2; border-radius: 14px; background: #fff; box-shadow: 0 8px 24px rgba(30, 50, 70, .07); transition: transform .25s ease, box-shadow .25s ease; }
        .travel-card:hover { transform: translateY(-5px); box-shadow: 0 16px 32px rgba(30, 50, 70, .13); }
        .travel-card-image { width: 100%; height: 220px; object-fit: cover; }
        .travel-card-placeholder { height: 220px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #e4f3f1, #eef2f9); color: #35968a; font-size: 3rem; }
        .score-pill { display: inline-flex; align-items: center; gap: .35rem; padding: .45rem .7rem; border-radius: 999px; color: #13795b; background: #e5f5ee; font-weight: 700; font-size: .85rem; }
        .package-summary { height: 100%; padding: clamp(1.1rem, 3vw, 1.6rem); border: 1px solid #e8edf2; border-radius: 18px; background: #fff; box-shadow: 0 12px 32px rgba(30, 50, 70, .09); }
        .package-summary-heading { display: flex; align-items: center; gap: .85rem; margin-bottom: 1.2rem; }
        .package-summary-heading > div:last-child { min-width: 0; }
        .package-summary-icon { display: flex; flex: 0 0 46px; align-items: center; justify-content: center; width: 46px; height: 46px; border-radius: 14px; color: #fff; background: var(--accent-color, #1e435f); font-size: 1.2rem; }
        .package-summary-eyebrow { margin: 0 0 .15rem; color: #718096; font-size: .7rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; }
        .package-summary-title { margin: 0; font-size: 1.15rem; font-weight: 700; }
        .package-summary-price { padding: 1rem; margin-bottom: 1rem; border-radius: 14px; background: #f1f7f6; }
        .package-summary-price span, .package-summary-stat span { display: block; color: #718096; font-size: .78rem; }
        .package-summary-price strong { display: block; margin-top: .2rem; color: #147d64; font-size: clamp(1.25rem, 4vw, 1.65rem); line-height: 1.25; overflow-wrap: anywhere; }
        .package-summary-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .65rem; }
        .package-summary-stat { min-width: 0; padding: .8rem; border: 1px solid #edf0f4; border-radius: 12px; background: #fff; }
        .package-summary-stat strong { display: block; margin-top: .25rem; color: #263746; font-size: .95rem; line-height: 1.35; overflow-wrap: anywhere; }
        .package-summary-stat-wide { grid-column: 1 / -1; }
        .package-summary-stat .bi-star-fill { color: #f4b740; }
        .package-summary-action { display: flex; min-height: 48px; align-items: center; justify-content: center; gap: .4rem; margin-top: 1rem; white-space: normal; }
        .nearby-rank-note { padding: .9rem 1rem; border: 1px solid #d5eee1; border-radius: 12px; background: #f0faf4; color: #286449; line-height: 1.5; }
        .pagination { justify-content: center; gap: .25rem; }
        .pagination .page-link { border: 0; border-radius: 8px; color: #1e435f; }
        .pagination .active .page-link { background: #1e435f; }
        @media (max-width: 575px) { .travel-card-image, .travel-card-placeholder { height: 190px; } }
    </style>
</head>
<body class="index-page">
    <x-layout.user.header />
    <main class="main">{{ $slot }}</main>
    <x-layout.user.footer />
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <script src="{{ url('public/user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/user/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('public/user/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ url('public/user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('public/user/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('public/user/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('public/user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('public/user/assets/js/main.js') }}"></script>
    <script src="{{ url('public/user/assets/js/nearby-recommendations.js') }}"></script>
</body>
</html>
