@extends('user.main')
@section('templateContent')
<main class="mb-5">
    <div class="head_page">
        <div class="container">

            <span><b>Trang chủ / Video hôm nay </b></span>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1
                    style="text-align: center;text-transform: uppercase;font-size: 30px;color: #fe4a55;border-bottom: 2px solid;padding-bottom: 7px;margin-top: 30px;font-weight: 600;">
                    Video hôm nay</h1>
                <div class="my-4">
                    <p style="text-align:center">Nhận điểm thưởng hằng ng&agrave;y khi xem video v&agrave; nhận ngay
                        kho kiến thức khi đăng k&yacute; t&agrave;i khoản trị gi&aacute; rất cao từ Bậc thầy Phan
                        Anh. Đến với &nbsp;KIEMTIENYOUTUBE.COM bạn được Bật M&iacute; c&aacute;ch kiếm tiền bằng
                        k&ecirc;nh Youtube, Tik Tok, kiếm tiền tr&ecirc;n c&aacute;c nền tưởng thương mại điện tử
                        như Shopee, Lazada&hellip;</p>
                </div>
                <div class="video-home">
                    <div class="row g-4">

                        @foreach ($items as $item)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="item_video">
                                <a href="{{ route('watch_videos', ['id' => $item->id]) }}" class="box_video">
                                    <i class="fa-brands fa-youtube position-absolute top-50 start-50 translate-middle"></i>
                                    <img src="{{ $item->image }}" alt="Động vật hoang dã" />
                                </a>
                                <h3>
                                    <a href="{{ route('watch_videos', ['id' => $item->id]) }}" title="Động vật hoang dã">{{ $item->title }}</a>
                                </h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <aside class="sidebar">
                    <div class="widget recent-post">
                        <h5 class="widget-title">Bài viết nổi bật</h5>

                    </div>
                </aside>
                <div class="box-login" style="padding: 0;">
                    <h1 class="title" style="">Thành viên đăng nhập</h1>
                    @if (!Auth::check())
                    <form method="POST" action="{{ route('login.post') }}" id="form-dangnhap">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" required="" name="email" class=" form-control" placeholder="Nhập email" value="{{ old('email') ?? $errors->first('email') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input required="" type="password" class=" form-control" name="password" placeholder="Nhập mật khẩu" value="{{ old('password') ?? $errors->first('password') }}">
                        </div>
                        <div class="mb-4 d-flex justify-content-between">
                            <div class="chek-form ">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="save" id="exampleCheckbox1" value="1">
                                    <label class="form-check-label" for="exampleCheckbox1"><span>Ghi nhớ đăng nhập</span></label>
                                </div>
                            </div>
                            <a href="{{ route('resetPassword.create') }}">Quên mật khẩu?</a>
                        </div>
                        <p class="help is-danger text-danger confirm_password">{{ $errors->first('msg') }}</p>
                        <div class="text-center">
                            <button type="submit" class="btn btn-main" name="login" value="2">Đăng nhập</button>
                        </div>
                    </form>
                    @endif
                </div>
                <div style="position: relative;">
                    <span
                        style="position: absolute;width: 100%;height: 100%;background-color: #fff;left: 0;right: 0;"></span>
                    <iframe style="width: 100%;" width="560" height="315"
                        src="https://www.youtube.com/embed/ndCBhq5MVOU?autoplay=1&amp;mute=1&amp;loop=1"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
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