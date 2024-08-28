<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('pageTitle')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ url('asset/images/Logo-shortcut.png') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/imagehover.css/2.0.0/css/imagehover.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- ************************************************************** -->
    <link rel="stylesheet" href="{{ asset('/asset/css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        #hero-image {
            background-image: url('{{ asset('asset/images/category_empty.jfif') }}');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 100%;
            height: 90vh;
        }

        .nav-link:hover span {
            color: #002ab0;
            border-bottom: 3px solid;
        }

        @media (max-width: 576px) {
            .breadcrumb li {
                font-size: 16px;
            }

            .action span, .contact-bg {
                display: none
            }

            .contact-title {
                font-size: 18px !important
            }

            .text-introduce {
                font-size: 18px !important
            }

            .introduce-top {
                text-align: center;
            }

            .scrollspy-example .border-bottom {
                border-width: 1px !important;
            }

            .img-introduce {
                display: none;
            }
    </style>
</head>

<body>

    <!-- Navbar -->
    @yield('layout-content')
    @include('user.layouts.header')
    @yield('templateContent')

    @include('user.layouts.footer')

    @include('user.buttonSocial')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

    <!-- Slicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('asset/js/home.js') }}"></script>
    <script src="{{ asset('asset/js/product-page.js') }}"></script>


    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('#isScroll').fadeIn(400).removeClass('visually-hidden');
            } else {
                $('#isScroll').fadeOut(400).addClass('visually-hidden');
            }
        });

        $(document).ready(function() {
            $('.text-des').each(function() {
                var maxLength = 180;
                var text = $(this).text();
                if (text.length > maxLength) {
                    var truncatedText = text.substring(0, maxLength) + '...';
                    $(this).text(truncatedText);
                }
            });

            $('.dt-slider').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                infinite: true,
                fade: true,
                cssEase: 'linear',
                arrows: false,
            });
        });
    </script>
    @yield('footer')
</body>

</html>
