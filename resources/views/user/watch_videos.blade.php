@extends('user.main')
@section('templateContent')
    <main class="mb-5">
        <div class="head_page">
            <div class="container">

                <span><b>Trang chủ / Video hôm nay </b></span>
            </div>
        </div>
        <script src="https://www.youtube.com/iframe_api"></script>
        <div class="container">
            <div class="video-home">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="news-detail">
                            <div id="player"></div>
                            @if (!Auth::check())
                                <div class="alert alert-warning text-center" role="alert">
                                    <i class="fa-solid fa-video-slash"></i> Vui lòng đăng ký thành viên để xem video
                                </div>
                            @endif
                            <h1 class="title mt-4"
                                style="border: none;text-transform: initial;font-size: 20px;margin-bottom: 0;"></h1>
                            <div class="head d-flex justify-content-between mt-3 mb-4">
                                <div>
                                    <span class="me-3"><i class="fa-regular fa-calendar-days me-2"></i>
                                        {{ $time }}</span>
                                    <a href="#l"><i class="fa-solid fa-tag me-2"></i> Video hôm nay</a>
                                </div>

                                <div class="chiase">
                                    Chia sẻ:
                                    <a href="http://www.facebook.com/sharer/sharer.php?u=https://nanaytb.com/may-bay-con-trung.html"
                                        title="" class="share" target="_blank">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=M%c3%a1y%20bay%20c%c3%b4n%20tr%c3%b9ng&amp;url=https://nanaytb.com/may-bay-con-trung.html"
                                        class="share" title="" target="_blank">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a class="share"
                                        href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://nanaytb.com/may-bay-con-trung.html&amp;title=M%c3%a1y%20bay%20c%c3%b4n%20tr%c3%b9ng&amp;source=https://nanaytb.com/may-bay-con-trung.html"
                                        title="" target="_blank">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-details">
                                <p>.</p>
                            </div>
                        </div>
                    </div>
                    @if (!Auth::check())
                        <div class="col-lg-3">
                            <aside class="sidebar">
                                <div class="widget recent-post">
                                    <h5 class="widget-title">Bài viết nổi bật</h5>

                                </div>
                            </aside>
                            <div class="box-login" style="padding: 0;">
                                <h1 class="title">Thành viên đăng nhập</h1>
                                <form method="POST" action="{{ route('login.post') }}" id="form-dangnhap">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" required="" name="email" class=" form-control"
                                            placeholder="Nhập email" value="{{ old('email') ?? $errors->first('email') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Mật khẩu</label>
                                        <input required="" type="password" class=" form-control" name="password"
                                            placeholder="Nhập mật khẩu"
                                            value="{{ old('password') ?? $errors->first('password') }}">
                                    </div>
                                    <div class="mb-4 d-flex justify-content-between">
                                        <div class="chek-form ">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="save"
                                                    id="exampleCheckbox1" value="1">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Ghi nhớ đăng
                                                        nhập</span></label>
                                            </div>
                                        </div>
                                        <a href="{{ route('resetPassword.create') }}">Quên mật khẩu?</a>
                                    </div>
                                    <p class="help is-danger text-danger confirm_password">{{ $errors->first('msg') }}</p>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-main" name="login" value="4">Đăng
                                            nhập</button>
                                    </div>
                                </form>

                            </div>
                            @if (!empty($url))
                                <div style="position: relative;">
                                    <span style="position: absolute;width: 100%;height: 100%;background-color: #fff;left: 0;right: 0;"></span>
                                    <iframe style="width: 100%;" width="560" height="315" src="{{ asset($url) }}"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                            @else 
                                <p>Video không tồn tại hoặc không thể tải. </p>
                            @endif
                    @endif
                </div>
            </div>
            <h2 class="title_home mt-5">
                <span>Video khác</span>
            </h2>
            <div class="swiper swiper_video">
                <div class="swiper-wrapper">
                    @foreach ($itemArr as $item)
                        <div class="swiper-slide item_video">
                            <a href="{{ route('watch_videos', ['id' => $item->id]) }}" class="box_video">
                                <i class="fa-brands fa-youtube position-absolute top-50 start-50 translate-middle"></i>
                                <img src="{{ $item->image }}" alt="Đại nỗi loạn" />
                            </a>
                            <h3>
                                <a href="{{ route('watch_videos', ['id' => $item->id]) }}"
                                    title="Đại nỗi loạn">{{ $item->title }}</a>
                            </h3>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
        </div>
        <style>
            #player {
                @auth pointer-events: auto;
                @else
                    pointer-events: none;
                @endauth
                }
            </style>

            <script>
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                var player;
                var timeSpent = 0;
                var checkInterval;

                function onYouTubeIframeAPIReady() {
                    player = new YT.Player('player', {
                        height: '450',
                        width: '640',
                        videoId: "{{ $videoId }}",
                        events: {
                            'onStateChange': onPlayerStateChange
                        }
                    });
                }

                function onPlayerStateChange(event) {
                    if (event.data == YT.PlayerState.PLAYING) {
                        checkInterval = setInterval(function() {
                            timeSpent += 1;
                            if (timeSpent >= 15) {
                                callAddPointApi();
                                clearInterval(checkInterval);
                            }
                        }, 1000);
                    } else {
                        clearInterval(checkInterval);
                    }
                }

                var isLoggedIn = "{{ Auth::check() ? 'true' : 'false' }}";

                // function callAddPointApi() {
                //     if (!isLoggedIn) {
                //         return;
                //     }
                //     $.ajax({
                //         url: 'http://127.0.0.1:8000/add-point',
                //         type: 'POST',
                //         data: {
                //             id: "{{ $id }}"
                //         },
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         success: function(response) {
                //             if (response.status == true) {
                //                 var formattedNumber = response.cash.toLocaleString('vi-VN');
                //                 $('.user_point').text(formattedNumber);
                //                 console.log('API called successfully:', response.cash);
                //             }
                //         },
                //         error: function(xhr) {
                //             console.log('API call failed:', xhr.responseText);
                //         }
                //     });
                // }

                function callAddPointApi() {
                    if (!isLoggedIn) {
                        return;
                    }

                    var baseUrl = window.location.origin; // Lấy URL gốc của trang hiện tại
                    var apiUrl = baseUrl + '/add-point'; // Ghép với đường dẫn API

                    $.ajax({
                        url: apiUrl,
                        type: 'POST',
                        data: {
                            id: "{{ $id }}"
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status == true) {
                                var formattedNumber = response.cash.toLocaleString('vi-VN');
                                $('.user_point').text(formattedNumber);
                                console.log('API called successfully:', response.cash);
                            }
                        },
                        error: function(xhr) {
                            console.log('API call failed:', xhr.responseText);
                        }
                    });
                }
            </script>


            <script>
                $(document).ready(function() {
                    $("#form-dangnhap").validate({
                        rules: {
                            email: {
                                required: true,
                                email: true
                            },
                            password: {
                                required: true
                            }
                        },
                        messages: {
                            email: {
                                required: "Vui lòng nhập email",
                                email: "Vui lòng nhập đúng định dạng mail"
                            },
                            password: {
                                required: "Vui lòng nhập mật khẩu"
                            }
                        }
                    });
                });
            </script>
        </main>
    @endsection
