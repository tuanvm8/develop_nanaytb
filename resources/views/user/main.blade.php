<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')</title>
    <meta name="keywords" content="kiemtienyotube.com" />
    <meta name="description" content="kiemtienyotube.com" />
    <link href="#" rel="canonical" />
    <link href="{{ url('asset/images/banner-quang-cao-youtube-ads.png') }}" rel="shortcut icon" type="image/x-icon" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="kiemtienyotube.com">
    <meta name="twitter:site" content="@https://nanaytb.com/">
    <meta name="twitter:description" content="kiemtienyotube.com">
    <meta name="twitter:image" content="asset/asset/images/banner-quang-cao-youtube-ads.png">
    <meta name="twitter:image:alt" content="kiemtienyotube.com">
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="index.html" />
    <meta property="og:title" content="kiemtienyotube.com" />
    <meta property="og:image" content="asset/images/banner-quang-cao-youtube-ads.png" />
    <meta property="og:description" content="kiemtienyotube.com" />
    <meta property="fb:page_id" content="f.me/blogtino/" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('templates/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/css/styles.css') }}">
    <!-- <script src="templates/js/jquery-3.6.4.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <!-- Tải jQuery Validation Plugin -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js" type="text/javascript">
    </script>
    <style>
        .formattedNumber sup.currency-symbol {
            font-size: 0.85em;
            vertical-align: middle;
            position: relative;
            top: -0.2em;
        }
    </style>
</head>

<body>

    @include('user.layout.header')
    @yield('templateContent')
    @include('user.layout.footer')

    <link rel="stylesheet" href="{{ asset('templates/css/all.min.css') }}">
    <script type="module" crossorigin src="{{ asset('templates/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('templates/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('templates/js/index.js') }}"></script>
    <script src="{{ asset('templates/js/sweetalert.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll('.formattedNumber');

            elements.forEach(function(element) {
                var number = parseInt(element.textContent, 10);
                var formattedNumber = number.toLocaleString('vi-VN');

                // Tạo HTML cho số và chữ đ
                element.innerHTML = `${formattedNumber}<sup style='text-transform: lowercase;'>đ</sup>`;
            });
        });
    </script>

</body>

</html>
